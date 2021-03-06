<?php

namespace App\Helpers\SavePrices;


class SavePriceSota
{

    public function pullPriceSota()
    {
        $mail_login = "vnstore2018@gmail.com";
        $mail_password = "nxanmishwgniwmmt";
        $mail_imap = "{imap.gmail.com:993/imap/ssl}INBOX";

        $connection = imap_open($mail_imap, $mail_login, $mail_password);

        if (!$connection) {
            echo("Ошибка соединения с почтой - " . $mail_login);
            exit;
        } else {

            $message_id = imap_search($connection, 'SINCE "' .
                date('d-M-Y', strtotime("-3 day")) . '" FROM "sub@sota.by"');
            $uniq_ids = [];
            $mails = [];
            if (!empty($message_id)) {

                if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing/price_sota/Price.zip')) {
                    foreach (glob($_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing/price_sota/Price.zip') as $file) {
                        unlink($file);
                    }
                }

                foreach ($message_id as $num) {
                    $header = imap_headerinfo($connection, $num);
                    $header = $header->from;

                    foreach ($header as $key => $value) {
                        $mailbox = $value->mailbox;
                        $host = $value->host;
                        $email = $mailbox . '@' . $host;
                    }

                    $headerArr = imap_headerinfo($connection, $num);
                    $uniq_id = imap_uid($connection, $headerArr->Msgno);
                    $uniq_ids[] = $uniq_id;
                    $mails[] = $email;
                    $comb_arr = array_combine($uniq_ids, $mails);
                    krsort($comb_arr, SORT_NATURAL);
                }

                $retailer = array_search("sub@sota.by", $comb_arr);
                $items_retailer = imap_fetch_overview($connection, $retailer, FT_UID);

                foreach ($items_retailer as $item_ret) {
                    $uniq_number_element = $item_ret->msgno;
                }

                $structure = imap_fetchstructure($connection, $uniq_id, FT_UID);

                $attachments = [];
                if (isset($structure->parts) && count($structure->parts)) {
                    for ($i = 1; $i < count($structure->parts); $i++) {
                        $attachments[$i] = [
                            'is_attachment' => false,
                            'filename' => '',
                            'name' => '',
                            'attachment' => ''
                        ];

                        if ($structure->parts[$i]->ifdparameters) {
                            foreach ($structure->parts[$i]->dparameters as $object) {
                                if (strtolower($object->attribute) == 'filename') {
                                    $attachments[$i]['is_attachment'] = true;
                                    $attachments[$i]['filename'] = $object->value;
                                }
                            }
                        }

                        if ($structure->parts[$i]->ifdparameters) {
                            foreach ($structure->parts[$i]->dparameters as $object) { //получаю имя
                                if (strtolower($object->value) != 'name') {
                                    $attachments[$i]['is_attachment'] = true;
                                    $attachments[$i]['name'] = $object->value;

                                }
                            }

                        }

                        if ($attachments[$i]['is_attachment']) {
                            $attachments[$i]['attachment'] = imap_fetchbody($connection, $uniq_number_element, $i + 1);

                            if ($structure->parts[$i]->encoding == 3) { // 3 = BASE64
                                $attachments[$i]['attachment'] = base64_decode($attachments[$i]['attachment']);
                            } elseif ($structure->parts[$i]->encoding == 4) { // 4 = QUOTED-PRINTABLE
                                $attachments[$i]['attachment'] = quoted_printable_decode($attachments[$i]['attachment']);
                            }
                        }

                        file_put_contents(
                            $_SERVER['DOCUMENT_ROOT'] . "/../prices_for_processing/price_sota/" .
                            iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $attachments[$i]['name']),
                            $attachments[$i]['attachment']
                        );
                    }

                }

            } else {
                dump('В течении последних 3 дней прайс от Сота не приходил');
            }
            imap_close($connection);
        }
    }
}
