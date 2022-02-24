<?php


namespace App\Helpers\ChatsUserFiles;


use App\Models\Any_users;

class Autofill_any_user_name
{
    public function autofill_any_user_name(){
        if($any_user_name == null && $_SESSION['session_id'] == $session_id){
            $user_name = Any_users::query()
                ->select('any_user_name')
                ->where('session_id','=',$_SESSION['session_id'])
                ->where('any_user_name','!=','null')
                ->get();
            foreach ($user_name as $item){
                $any_user_name = $item->any_user_name;
            }
        }
    }
}
