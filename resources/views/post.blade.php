@extends('layouts.blog-post')

@section('content')



                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span>Posted {{$post->created_at->diffForHumans()}} </p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$post->photo->file}}" alt="">

                <hr>

                <!-- Post Content -->
                {{$post->body}}

                <hr>

                <!-- Blog Comments -->
                @if (Auth::check())
                    <div class="well">
                        @if (Session::has('comments'))
                            {{session('comments')}}
                        @endif
                        <h4>Leave a Comment:</h4>
                        {!! Form::open(['method'=>'POST', 
                        'action'=>'App\Http\Controllers\PostCommentsController@store', 
                        'files'=>true]) !!}
                        {{ csrf_field() }}
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <div class="form-group">
                            {!! Form::label('body', 'Comment') !!}
                            {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3]) !!}
                        </div>

                        <div class="form-group">

                            {!! Form::submit('Submit Comments', ['class'=>'btn btn-primary']) !!}

                        </div>
                        {!! Form::close() !!}
                    </div>
                @endif

                <!-- Comments Form -->
                

                <hr>

                <!-- Posted Comments -->

                @if (count($comments) > 0)
                    @foreach ($comments as $comment)
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img height="50" width="100" src="{{ $comment->photo}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$comment->author}}
                                    <small>{{$comment->created_at->diffForHumans()}}</small>
                                </h4>
                                {{$comment->body}}

                                @if (count($comment->replies) > 0)
                                    @foreach ($comment->replies as $reply)
                                    @if ($reply->is_active == 1)
                                        

                                        <div id="nested-comment" class="media">
                                            <a class="pull-left" href="#">
                                                <img height="50" width="100" src="{{ $reply->photo}}" alt="">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading">{{ $reply->author }} 
                                                    <h2>shdsgh</h2>
                                                    <small>{{ $reply->created_at->diffForHumans() }}</small>
                                                </h4>
                                                <p>{{ $reply->body }}</p>
                                                contesss
                                            </div>
                                                <div class="comment-reply-container">
                                                    <p>content</p>
                                                    <button class=" btn btn-primary pull-right">Reply</button>
                                                    <div class="comment-reply col-sm-6">
                                                        {!! Form::open(['method'=>'POST', 
                                                                'action'=>'App\Http\Controllers\CommentRepliesController@createReply', 
                                                                'files'=>true]) !!}
                                                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                                        <div class="form-group">
                                                            {!! Form::label('body', 'Reply') !!}
                                                            {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3]) !!}
                                                        </div>

                                                        <div class="form-group">

                                                            {!! Form::submit('Post', ['class'=>'btn btn-primary']) !!}

                                                        </div>
                                                        {!! Form::close() !!}                                        
                                                    </div>
                                                </div>
                                        
                                    </div>
                                    
                                    @endif
                                        
                                    @endforeach
                                    @else
                                    <h2>No replies</h2>
                                @endif

                                
                            </div>
                        </div>
                    @endforeach                
                @endif


                
                <!-- Comment -->
                

                <!-- Comment -->
                {{-- <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="/images/placeholder.jpgalt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="/images/placeholder.jpgalt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div> --}}

            
    
@endsection
@section('script')
        <script>
            $(".comment-reply-container .toggle-reply").click(function(){
                $(this).next().slideToggle("slow");
            });
        </script>
            
        @endsection