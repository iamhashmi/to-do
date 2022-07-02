<?php

namespace App\Http\Controllers;

use App\Items;
use App\User;
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

        $this->getValidate();
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $item = new Items($request->all());
        $user->items()->save($item);
        return redirect(route('todo'))->with('success', 'record added');

    }
    public function editItem($id){
    $item = Items::findOrFail($id);
    return view('edit',compact('item'));
    }

    public function updateItem(Request $request, $id){

        $user_id = Auth::user()->id;
        $item = Items::findOrFail($id);
        $item->user_id = $user_id;
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

    public function getValidate(): void
    {
        request()->validate([
            'subject' => 'required|unique:items',
            'description' => 'required',
            'priority' => 'required',
            'start_at' => 'required',
            'finish_at' => 'required',
        ]);
    }
}
