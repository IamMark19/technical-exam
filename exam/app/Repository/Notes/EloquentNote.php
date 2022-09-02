<?php

namespace App\Repository\Notes;

use App\Models\Note;

class EloquentNote implements NoteInterface 
{
    protected $note;

    public function __construct(Note $note)
    {
        $this->note = $note;
    }

    public function getAll($select)
    {
        return $this->note->select($select);
    }

    public function findById($id)
    {
        return $this->note->find($id);
    }

    public function create($request)
    {
        return $this->note->create([
            'title' => $request['title'],
            'note' => $request['note'],
            'is_deleted' => 0,
        ]);
    }

    public function update($request,$id)
    {
        $data = $this->findById($id);
       
        $data->update([
            'title' => $request['title'],
            'note' => $request['note'],
        ]);
       
        return $data;
    }

    public function delete($id)
    {
        $data = $this->findById($id);
       
        $data->update([
            'is_deleted' => 1,
        ]);
    }
}