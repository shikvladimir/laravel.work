<?php


namespace App\Helpers\UploadPrice;


use App\Models\Price;
use PhpOffice\PhpSpreadsheet\Writer\Xls;

class GetNewPrice
{
    public function get_new_price(){
        header('Content-type: text/html; charset=utf-8');
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="export.csv";');

        $sql = Price::all()->toArray();
        $fp = fopen('php://output', 'w');

        $names_column = [
            'Раздел',
            'Производитель',
            'Товар',
            'Артикул',
            'id-предложения',
            'Цена',
            'Валюта',
            'Описание предложения',
            'Изготовитель',
            'Импортер',
            'Сервисный центр',
            'Гарантия',
            'Срок доставки по Минску',
            'Срок доставки по РБ',
            'Срок службы',
            'Только для юр. лиц',
            'Кредит',
            'Наличие на складе',
            'Срок рассрочки по Халве',
            'Цена (Халва)',
            'Onliner Prime',
        ];


        $column = [];
        foreach ($names_column as $col){
            $column[] = html_entity_decode($col, ENT_NOQUOTES,'UTF-8');
        }
        fputcsv($fp, $column, ";");

        foreach ($sql as $key => $value){
            array_shift($value);
            fputcsv($fp, $value, ";");
        }


    }
}
