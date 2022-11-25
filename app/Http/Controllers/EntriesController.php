<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entries;
use Session;

class EntriesController extends Controller
{
    public function addEntry()
    {
        return view('add-entry');
    }
    public function saveEntry(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required',
        ]);
        $title = $request->title;
        $message = $request->message;

        $entry = new Entries();
        $entry->title = $title;
        $entry->message = $message;
        $entry->users_id = Session::get('loginId');
        $entry->save();
        return redirect()->back()->with('success', 'Eintrag ins Gästebuch hinzugefügt');
    }
    public function editEntry($id)
    {
        $data = Entries::where('id', '=', $id)->first();
        return view('edit-entry', compact('data'));
    }
    public function updateEntry(Request $request)
    {
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
    public function deleteEntry($id)
    {
        Entries::where('id', '=', $id)->delete();
        return redirect()->back()->with('success', 'Eintrag im Gästebuch erfolgreich gelöscht.');
    }
    public function search(Request $request)
    {
        $output="";
        $result = Entries::where('title', 'like', '%' . $request->search . '%')->orWhere('message', 'like', '%' . $request->search . '%')->get();

        foreach($result as $result){
            $output.=
            '<tr>

            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">'.$result->id.'</td>
            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">'.$result->title.'</td>
            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">'.$result->message.'</td>
            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
               Name</td> 

            </tr>';
            
        }
        return response($output);
    }
}
