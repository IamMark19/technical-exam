<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Notes\NoteInterface;
use DB;

class NoteController extends Controller
{
    protected $note; 

    public function __construct(NoteInterface $note)
    {
        $this->note = $note;
    }

    public function index()
    {
        $data = $this->note->getAll("*")->where("is_deleted",0);

        return view('note.index')->with([
            'data' => $data->paginate(15),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'note' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $this->note->create($validated);           
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
        }

        return back()->with('success','Note Created successfully!');
    }

    public function edit($id) 
    {
        $note = $this->note->findById($id);

        return view('note.update')->with([ 'note' => $note,]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'note' => 'required|string',
        ]);

        DB::beginTransaction();
        try {
            $this->note->update($validated,$id);           
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
        }

        return redirect()->route('note')->with('success','Note Updated Successfully');
    }

    public function delete($id)
    {
        $todo = $this->note->delete($id);

        return redirect()->route('note')->with('error','Note Delete Successfully');
    }
}
