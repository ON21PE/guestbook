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
    public function editEntry($id){
        $data= Entries::where('id', '=', $id)->first();
        return view('edit-entry', compact('data'));
    }
    public function updateEntry(Request $request){
        $request->validate([
            'title' => 'required',
            'message' => 'required',
        ]);
        $id = $request->id;
        $title = $request->title;
        $message = $request->message;

        Entries::where('id', '=', $id)->update([
            'title' => $title,
            'message' => $message,
        ]);
        return redirect()->back()->with('success', 'Eintrag im Gästebuch erfolgreich bearbeitet.');
    }
    public function deleteEntry($id){
        Entries::where('id', '=', $id)->delete();
        return redirect()->back()->with('success', 'Eintrag im Gästebuch erfolgreich gelöscht.');
    }
}
