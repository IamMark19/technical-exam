<?php

namespace App\Repository\Notes;

interface NoteInterface
{
    public function getAll($select);
    
    public function findById($id);

    public function create($request);

    public function update($request,$id);

    public function delete($id);
}