<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entries;
use App\Models\User;



class IndexController{
    public function indexAction(){
        $data = Entries::get();
        $users = User::get();
        return view('guestbook')->with(['data'=>$data, 'users'=>$users]);

    }
}
?>