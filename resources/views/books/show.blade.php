
@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header"> <h3>Book Details</h3></div>
<div class="card-body">

<table class="table table-striped" border="1" >

<tr> <th>Title </th> <td>{{$book->title}}</td></tr>
<tr> <th>Genre </th> <td>@foreach($book->category as $category) {{$category}} @endforeach</td></tr>
<tr> <th>Author </th> <td>{{$book->author}}</td></tr>
<tr> <th>Publish Date</th> <td>{{$book->publish_year}}</td></tr>
<tr> <th>Price</th> <td>{{$book->price}}</td></tr>
<tr> <th>Available stock</th> <td>{{$book->stock}}</td></tr>

<tr> <td colspan='2' ><img style="width:100%;height:100%"
src="{{ asset('storage/images/'.$book->cover_image)}}"></td></tr>
</table>

<table><tr>
<td><a href="{{route('books.index')}}" class="btn btn-primary" role="button">Back to the Book
list</a></td>
</tr></table>

</div>
</div>
</div>
</div>
</div>

@endsection
