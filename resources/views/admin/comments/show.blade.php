@extends('layouts.admin')

@section('content')

    @if ($comments)
    <h1>Comment Page</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Created On</th>
                <th>Post</th>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    

                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{ Str::limit($comment->body, 10, '...')}}</td>
                    <td>{{$comment->created_at}}</td>
                    <td><a href="{{route('home.post', $comment->post_id )}}">View Post</a></td>
                    <td>
                        @if ($comment->is_active == 1)
                        {!! Form::open(['method'=>'PATCH', 
                        'action'=> ['App\Http\Controllers\PostCommentsController@update', $comment->id]]) !!}

                        <input type="hidden" name="is_active" value="0">
                        <div class="form-group">
                            {!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
                        </div>
                        {!! Form::close() !!}
                        @else
                        {!! Form::open(['method'=>'PATCH', 
                        'action'=> ['App\Http\Controllers\PostCommentsController@update', $comment->id]]) !!}

                        <input type="hidden" name="is_active" value="1">
                        <div class="form-group">
                            {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                        </div>
                        {!! Form::close() !!}                            
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 
                        'action'=> ['App\Http\Controllers\PostCommentsController@update', $comment->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete ', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!} 
                    </td>
                                            
                    
                </tr>
                @endforeach
        </tbody>
    </table>
    

    @else
        <h1 class="bg bg-danger text-center">No Comments</h1>
    
        @endif
    
@endsection