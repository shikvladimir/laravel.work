<?php


namespace App\Helpers;


class USD implements Currencies
{

    public function getCourse()
    {
        $getCourse = file_get_contents('https://www.nbrb.by/api/exrates/rates?periodicity=0');
//        $course = json_decode($getCourse);
//        $courseId = array_filter($course, 'Cur_ID' == 145);
//        dd($getCourse);

//        foreach ($course as $key => $value) {
////            $a[] = $value;
//            dump($value);
//        }
    }
}
