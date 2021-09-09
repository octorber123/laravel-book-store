@extends('layouts.app')
@section('content')

<div class="container">
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header">Update Book Stock</div>

@if ($errors->any())
<div class="alert alert-danger">

<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div><br />

@endif
@if (\Session::has('success'))
<div class="alert alert-success">
<p>{{ \Session::get('success') }}</p>
</div><br />

@endif
<table class="table table-striped" border="1" >
<tr> <th>Title </th> <td>{{$book->title}}</td></tr>
<tr> <th>Genre </th> <td>@foreach($book->category as $category) {{$category}} @endforeach</td></tr>
<tr> <th>Author </th> <td>{{$book->author}}</td></tr>
<tr> <th>Publish Date</th> <td>{{$book->publish_year}}</td></tr>
<tr> <th>Price</th> <td>{{$book->price}}</td></tr>
<tr> <th>Current stock</th> <td>{{$book->stock}}</td></tr>
</table>

<div class="card-body">
<form class="form-horizontal" method="POST" action="{{ action('BookController@update',
$book['id']) }} " enctype="multipart/form-data" >
@method('PATCH')

@csrf

 <div class="col-md-8">
 <label >Stock</label>
<input type="number" name="stock" min="0"
placeholder="Stock" />
 </div>

<input class="btn btn-primary "type="submit" value="submit" />



</form>
<table>
  <tr>
    <td><a href="{{route('books.index')}}" class="btn btn-primary" role="button">Back to the
    list</a></td>
  </tr>

</table>
</div>
</div>
</div>
</div>
</div>
@endsection
