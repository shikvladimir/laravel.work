<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class AllPricesListsController extends Controller
{
    public function allPricesLists()
    {
        $list = $_SERVER['DOCUMENT_ROOT'] . '/../prices_for_processing';
        $files = scandir($list);
        unset($files[0]);
        unset($files[1]);


        foreach ($files as $key=>$file){
            dump($key)  ;
        }


        if(isset($_POST['isChecked']) &&
            $_POST['isChecked'] == 'Yes'){

            dd($_POST['isChecked']);
        }
//        dd($chack);
        return view('home.home', compact(
            'files',
        ));
    }
}
