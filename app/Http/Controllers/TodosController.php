<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function liste(){
        return view(
            'home',
            ['todos' =>Todo::all()]
        );
    }

    public function saveTodo(Request $request){
        $texte=$request->input('texte');
        if($texte){
            $todo =new Todo();
            $todo ->texte = $texte;
            $todo ->termine = 0 ;
            $todo->save();
        }
        return redirect()->route('todo.list');
    }


    public function makeAsdone($id){
        $todo=Todo::find($id) ;
        if($todo){
            $todo->termine=1;
            $todo ->save();
        }
        return redirect()->route('todo.list');
    }

    public function deleteTodo($id){
        $todo =Todo::find($id);

        if($todo){
            $todo->delete();
        }
        return redirect()->route('todo.list');
    }
}
