<?php

namespace App\ViewComposers;

use App\Models\Price;
use Illuminate\View\View;

class GeneralComposer
{
        public function compose(View $view){
            $datas = Price::query()->paginate(100);
            $data = [];
            foreach ($datas as $key => $value) {
                $data[] = $value;
            }

            $list = $_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing';
            $files = scandir($list);
            unset($files[0]);
            unset($files[1]);

            return $view
                ->with('datas', $datas)
                ->with('data',$data)
                ->with('files',$files);
        }


}
