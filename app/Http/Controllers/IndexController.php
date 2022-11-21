<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entries;


class IndexController{
    public function indexAction(){
        $data = Entries::get();
        return view('guestbook', compact('data'));
    }
}
?>