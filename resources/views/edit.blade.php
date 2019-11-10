@extends('layout')

@section('content')

    <div class="row">
        <div class="col-sm-6">
            <h4>Edit Post</h4>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{ route('posts.index') }}" class="btn btn-danger mb-2">Go Back</a>
        </div>
    </div>
    <hr/>

    <form action="{{ route('posts.update', $post_info->id) }}" method="POST" name="update_post">
        {{ csrf_field() }}
        @method('PATCH')

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Title</strong>
                    <input id="post_title" type="text" name="title" class="form-control" placeholder="Enter Title"
                           value="{{ $post_info->title }}">
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Content</strong>
                    <textarea id="image_text" class="form-control" col="4" name="post_body" placeholder="Enter Content"
                              style="padding-left: 110px">{{ $post_info->post_body }}</textarea>
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

