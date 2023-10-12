@extends('layouts.admin')

@section('content')
@if (Session()->has('deleted_photo'))
<p class="bg-danger">{{ Session('deleted_photo') }} </p>    
@endif
<h1>Media Pictures</h1>

@if ($photos)
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Created</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
            @foreach ($photos as $photo)
                <tr>
                   <td>{{$photo->id}} </td>
                   <td><img  height="50" width="100" src="{{ $photo->file ? $photo->file : "'/images/placeholder.jpg'"}}" alt=""></td>
                   <td>{{$photo->created_at ? $photo->created_at : 'No Date'}} </td>
                   <td>{{$photo->file}} </td>
                   <td>
                    {!! Form::open(['method'=>'DELETE', 
                    'action'=> ['App\Http\Controllers\AdminMediasController@destroy', $photo->id]]) !!}

             <div class="form-group">
                 {!! Form::submit('Delete Image', ['class'=>'btn btn-danger']) !!}
             </div>
        {!! Form::close() !!}
                   </td>
                </tr>
            @endforeach
    </tbody>
</table>
@endif

    
@endsection