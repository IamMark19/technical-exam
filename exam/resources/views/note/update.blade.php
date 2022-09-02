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
                <form action="{{ route('note.update',['id' => $note->id]) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h4 class="card-title">Update Note</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{$note->title}}" placeholder="Enter Title">
                            </div>
                                <div class="col-md-12 mb-3">
                                <label>Note</label>
                                <textarea name="note" id="note" cols="30" rows="4" class="form-control" placeholder="Add Details...">{{$note->note}}</textarea>
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
@endsection

 @push('script') 
@endpush