<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
 <div class="row justify-content-center">
<div class="col-md-10 ">
 <div class="card">
 <div class="card-header">Add an new item</div>
<!-- display the errors -->
@if ($errors->any())
<div class="alert alert-danger">
<ul> @foreach ($errors->all() as $error)
<li>{{ $error }}</li> @endforeach
</ul>
</div><br /> @endif
<!-- display the success status -->
@if (\Session::has('success'))
<div class="alert alert-success">
<p>{{ \Session::get('success') }}</p>
</div><br /> @endif
 <!-- define the form -->
<div class="card-body">
<form class="form-horizontal" method="POST"
action="{{route('books.store')}}" enctype="multipart/form-data">

@csrf

<div class="col-md-8">
<label >Book Title</label>
<input type="text" name="title"
placeholder="Book Title" />
</div>

<div class="col-md-8">
  <fieldset>
    <label>Category
    </label>
    <input type="checkbox" name="category[]" value="Computing">Computing<br />
    <input type="checkbox" name="category[]" value="Business">Business<br />
    <input type="checkbox" name="category[]" value="Languages">Languages<br />
  </fieldset>
</div>

<div class="col-md-8">
<label >Author</label>
<input type="text" name="author"
placeholder="Author" />
</div>

 <div class="col-md-8">
 <label >Price</label>
<input type="number" name="price"
placeholder="Price" />
 </div>

 <div class="col-md-8">
 <label >Publish date</label>
<input type="date" name="publish_year"
placeholder="Publish date" />
 </div>

 <div class="col-md-8">
 <label >Stock</label>
<input type="number" name="stock"
placeholder="Stock" />
 </div>


<div class="col-md-8">
<label>Cover Image</label>
<input type="file" name="cover_image"
placeholder="Image file"/>
</div>

<div class="col-md-6 col-md-offset-4">
<input type="submit" class="btn btn-primary" />
<input type="reset" class="btn btn-primary" />

</div>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection
