@extends('layouts.app')
@section('content')

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
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8 ">
<div class="card">
<div class="card-header"><h3>Listss of Books on sale</h3></div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-striped sortable">
<thead>
<tr>
<th>Title</th>
<th>Category</th>
<th>Price</th>
<th colspan="3">Action</th>
</tr>
</thead>
<tbody>
@foreach($books as $book)
<tr>
<td>{{$book['title']}}</td>
<td>@foreach($book->category as $category) {{$category}} @endforeach</td>
<td>{{$book['price']}}</td>
<td><a href="{{action('BookController@edit', $book['id'])}}" class="btn
btn- warning">Edit</a></td>
  <td><a href="{{action('BookController@show', $book['id'])}}" class="btn
  btn- primary">Details</a></td>

</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
