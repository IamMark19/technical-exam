@extends('common.layouts.template')
@section('title', 'Note')
@section('header', 'Note')

@section('style')
<style>
    /* Style */
</style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('note.create') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h4 class="card-title">Add Note</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Title</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                            </div>
                                <div class="col-md-12 mb-3">
                                <label>Note</label>
                                <textarea name="note" id="note" cols="30" rows="4" class="form-control" placeholder="Add Details..."></textarea>
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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <table class="table-responsive">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Note</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $row)
                            <tr>
                                <td scope="row">{{$row->id}}</td>
                                <td scope="row">{{$row->title}}</td>
                                 <td scope="row">{{$row->note}}</td>
                                <td scope="row">{{$row->created_at}}</td>
                                <td scope="row">
                                    <a href="{{ route('note.edit', ['id' => $row->id]) }}" class="btn btn-warning" type="button">Edit</a>
                                    <a href="{{ route('note.delete', ['id' => $row->id]) }}" class="btn btn-danger" type="button">Delete</a>
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