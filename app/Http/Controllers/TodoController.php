<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todos;

class TodoController extends Controller
{
    public function index(){
        $todositem= Todos::all();
        return view('todos.todo',compact('todositem'));
        
    }
    public function store(Request $req){
        $item= new Todos();
        $item->todoitem=$req->input('todoitem');
        $item->save();
        return redirect('/')->with('status','Item has been added successfully');
        
    }
    public function markcomplete($id){
        $item=Todos::find($id);
        $item->is_completed="1";
        $item->update();
        return redirect('/')->with('status','Item has been marked as complete');


        
    }
    public function delete($id){
        $item=Todos::findorfail($id);
        $item->delete();
        return redirect('/')->with('status','Item deleted successfully');


        
    }
}
