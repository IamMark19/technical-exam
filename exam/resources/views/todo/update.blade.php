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
                    <form action="{{ route('todo.update',['id' => $todo->id]) }}" method="POST">
                         @csrf
                         @method('PATCH')
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col-md-12">
                                    <h4 class="card-title">Update Todo</h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label>Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{$todo->title}}" placeholder="Enter Title">
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
    {{-- <div class="row">
        <div class="col-12">
            <div class="card">
                <table class="table-responsive">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                         <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td style=" {{ ($row->is_done == 1) ? 'text-decoration: line-through' : '' }}">{{$row->title}}</td>
                                
                                <td>{{$row->created_at}}</td>
                                <td>

                                @if ($row->is_done == 0)
                                      <a href="{{ route('todo.done', ['id' => $row->id]) }}" class="btn btn-primary" type="button">Mark As Done</a>
                                @endif
                               
                               <a href="{{ route('todo.edit', ['id' => $row->id]) }}" class="btn btn-warning" type="button">Edit</a>
                                <a href="{{ route('todo.done', ['id' => $row->id]) }}" class="btn btn-danger" type="button">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10" center>No Available Todo</td>
                            </tr>
                        @endforelse
                         
                    </tbody>
                  
                </table>
            </div>
            {{ $data->links() }}
        </div>
    </div> --}}
@endsection

 @push('script') 
@endpush
