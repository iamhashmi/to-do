<?php

namespace App\Http\Controllers;

use App\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function getItems(){
        $items = Items::orderBy('priority','ASC')->get();
        return view('home', compact('items'));
    }

    public function createItem()
    {

        return view('todo');
    }

    public function addItem(Request $request){

         request()->validate([
            'subject'=>'required|unique:items',
            'description' =>'required',
            'priority' => 'required',
            'start_at' => 'required',
            'finish_at' => 'required',
        ]);

        $user = Auth::user()->id;
        $item = new Items();
        $item->user_id = $user;
        $item->subject = $request->subject;
        $item->description = $request->description;
        $item->priority = $request->priority;
        $item->start_at = $request->start_at;
        $item->finish_at = $request->finish_at;
        $item->save();
        return redirect(route('todo'))->with('success', 'record added');

    }
    public function editItem($id){
    $item = Items::findOrFail($id);
    return view('edit',compact('item'));
    }

    public function updateItem(Request $request, $id){
        $user = Auth::user()->id;
        $item = Items::findOrFail($id);
        $item->user_id = $user;
        $item->subject = $request->subject;
        $item->description = $request->description;
        $item->priority = $request->priority;
        $item->start_at = $request->start_at;
        $item->finish_at = $request->finish_at;
        $item->update();
        return redirect(route('todo'))->with('warning', 'record updated');
    }

    public function destroy($id){
        $item = Items::findOrFail($id);
        $item->delete($item);
        return redirect(route('todo'))->with('delete', 'record deleted');
    }
}
