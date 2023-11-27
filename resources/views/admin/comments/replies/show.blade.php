@extends('layouts.admin')

@section('content')

    @if ($replies)
    <h1>Reply Page</h1>
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
            @foreach ($replies as $reply)
                @if (count($replies) > 0)
                    
                
                <tr>
                    

                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{ Str::limit($reply->body, 10, '...')}}</td>
                    <td>{{$reply->created_at}}</td>
                    <td><a href="{{route('home.post', $reply->comment->post_id )}}">View Post</a></td>
                    <td>
                        @if ($reply->is_active == 1)
                        {!! Form::open(['method'=>'PATCH', 
                        'action'=> ['App\Http\Controllers\CommentRepliesController@update', $reply->id]]) !!}

                        <input type="hidden" name="is_active" value="0">
                        <div class="form-group">
                            {!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
                        </div>
                        {!! Form::close() !!}
                        @else
                        {!! Form::open(['method'=>'PATCH', 
                        'action'=> ['App\Http\Controllers\CommentRepliesController@update', $reply->id]]) !!}

                        <input type="hidden" name="is_active" value="1">
                        <div class="form-group">
                            {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                        </div>
                        {!! Form::close() !!}                            
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 
                        'action'=> ['App\Http\Controllers\CommentRepliesController@destroy', $reply->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete ', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!} 
                    </td>
                                            
                    
                </tr>
                @else
                    <h1 class="text-center">No Replies</h1>
                @endif
                @endforeach
        </tbody>
    </table>
    

    @else
        <h1 class="bg bg-danger text-center">No replies</h1>
    
        @endif
    
@endsection