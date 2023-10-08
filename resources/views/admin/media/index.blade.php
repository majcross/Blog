@extends('layout.admin')

@section('content')
<h1>Media Pictures</h1>

@if ($photos)
<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
            @foreach ($photos as $photo)
                <tr>
                   <td>{{$photo->id}} </td>
                   <td>{{$photo->created_at}} </td>
                   <td>{{$photo->file}} </td>
                </tr>
            @endforeach
    </tbody>
</table>
@endif

    
@endsection