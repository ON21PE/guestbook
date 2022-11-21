<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entries;

class EntriesController extends Controller
{
    public function addEntry(){
        return view('add-entry');
    }
    public function saveEntry(Request $request){
        $request->validate([
            'title' => 'required',
            'message' => 'required',
        ]);
        $title = $request->title;
        $message = $request->message;

        $entry = new Entries();
        $entry->title = $title;
        $entry->message = $message;
        $entry->save();
        return redirect()->back()->with('success', 'Eintrag ins Gästebuch hinzugefügt');

    }
}
