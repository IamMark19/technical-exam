@extends('common.layouts.template')
@section('title', 'Todo')
@section('header', 'Todo')

@section('style')
<style>
    /* Style */
</style>
@endsection

@section('content')
    <div id="todo-page">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('todo.create') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col-md-12">
                                    <h4 class="card-title">Add Todo</h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label>Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                                </div>
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary" id="submitBtn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <table class="table-responsive">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                         <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $row)
                            <tr>
                                <td scope="row">{{$row->id}}</td>
                                <td scope="row" style=" {{ ($row->is_done == 1) ? 'text-decoration: line-through' : '' }}">{{$row->title}}</td>
                                <td scope="row">{{$row->created_at}}</td>
                                <td scope="row">
                                    @if ($row->is_done == 0)
                                        <a href="{{ route('todo.done', ['id' => $row->id]) }}" class="btn btn-primary" type="button">Mark As Done</a>
                                    @endif
                                    <a href="{{ route('todo.edit', ['id' => $row->id]) }}" class="btn btn-warning" type="button">Edit</a>
                                    <a href="{{ route('todo.delete', ['id' => $row->id]) }}" class="btn btn-danger" type="button">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">No Available Todo</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $data->links() }}
        </div>
    </div>
@endsection

 @push('script') 
@endpush
