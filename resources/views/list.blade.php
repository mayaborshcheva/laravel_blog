@extends('Layout')

@section('content')


    <div class="row">
        <div class="col-sm-6">
            <h4>All posts</h4>
            <a href="{{ route('posts.create') }}" class="btn btn-success mb-2">Add</a>
        </div>

    </div>
    <hr/>
    <div class="col-sm-12">
        <div class="row">

            @foreach($posts as $post)

                <div class="w-100">
                    <h2>{{ $post->title }}</h2>
                    <div>
                        <img src="{{ $post->post_url }}" alt="">
                        <h4>{{ $post->post_body }}</h4>
                    </div>

                    <div>

                        <a href="{{ route('posts.edit',$post->id)}}" class="btn btn-primary float-left mr-3">Edit</a>

                        <form action="{{ route('posts.destroy', $post->id)}}" method="post">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button onclick="return confirm('are you sure?')" class="btn btn-danger float-left"
                                    type="submit">Delete
                            </button>
                        </form>
                        <div class="clearfix"></div>
                    </div>

                    <hr/>

                    @endforeach
                    @if(count($posts) < 1)
                        <tr>
                            <td colspan="10" class="text-center">There are no post available yet!</td>
                            </td>
                        </tr>
                    @endif
                    {!! $posts->links() !!}
                </div>
        </div>
    </div>
@endsection