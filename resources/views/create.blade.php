@extends('layout')

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h4>Add Post</h4>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{ route('posts.index') }}" class="btn btn-danger mb-2">Go Back</a>
        </div>
    </div>
    <hr/>

    <form action="{{ route('posts.store') }}" method="POST" name="add_post">
        {{ csrf_field() }}

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Title</strong>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title">
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Content</strong>
                    <textarea class="form-control" col="4" name="post_body" placeholder="Enter Content"></textarea>
                    <span class="text-danger">{{ $errors->first('post_body') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('posts.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
@endsection