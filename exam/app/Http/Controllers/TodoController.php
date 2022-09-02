<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Todos\TodoInterface;
use DB;

class TodoController extends Controller
{
    protected $todo; 

    public function __construct(TodoInterface $todo)
    {
        $this->todo = $todo;
    }

    public function index()
    {
        $data = $this->todo->getAll("*")->where("is_deleted",0);

        return view('todo.index')->with([
            'data' => $data->paginate(15),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $this->todo->create($validated);           
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
        }

        return back()->with('success','Todo Created successfully!');
    }

    public function done($id) 
    {
        $this->todo->done($id);

        return back()->with('success','Todo Mark As Done successfully!');
    }

    public function edit($id) 
    {
        $todo = $this->todo->findById($id);

        return view('todo.update')->with([ 'todo' => $todo,]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $this->todo->update($validated,$id);           
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
        }

        return redirect()->route('todo')->with('success','Todo Updated Successfully');
    }

    public function delete($id)
    {
        $todo = $this->todo->delete($id);

        return redirect()->route('todo')->with('error','Todo Delete Successfully');
    }
}
