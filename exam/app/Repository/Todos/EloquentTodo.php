<?php

namespace App\Repository\Todos;

use App\Models\Todo;

class EloquentTodo implements TodoInterface 
{
    protected $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function getAll($select)
    {
        return $this->todo->select($select);
    }

    public function findById($id)
    {
        $data = $this->todo->find($id);
        // dd($data);
        return $data;
    }

    public function create($request)
    {
        return $this->todo->create([
            'title' => $request['title'],
            'is_done' => 0,
            'is_deleted' => 0
        ]);
    }

    public function update($request,$id)
    {
        $data = $this->findById($id);
       
        $data->update([
            'title' => $request['title'],
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

    public function done($id)
    {
        $data = $this->findById($id);
       
        $data->update([
            'is_done' => 1,
        ]);
       
        return $data;
    }
}