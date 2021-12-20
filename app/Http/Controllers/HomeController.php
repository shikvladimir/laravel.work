<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $datas = DB::table('prices')->get();
        $data = [];
        foreach ($datas as $key => $value) {
            $data[] = $value;
        }

        return view('home.home', compact('data'));
    }

    public function getCourse()
    {
//        $getCourse = file_get_contents('https://www.nbrb.by/api/exrates/currencies');
//        $course = json_decode($getCourse);
////        dd($course);
//        $courseId = array_filter($course,'Cur_ID' == 145);
//        dd($courseId);
//        foreach ($course as $key => $value) {
////            $a[] = $value;
//            dump($value);
//        }

    }
}
