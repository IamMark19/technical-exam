<?php

namespace App\Repository\Todos;

interface TodoInterface
{
    public function getAll($select);
    
    public function findById($id);

    public function create($request);

    public function update($request,$id);

    public function delete($id);

    public function done($id);
}