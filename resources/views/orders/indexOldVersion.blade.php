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
<div class="card-header"><h3>You Shopping Cart</h3></div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-striped" style="width: 100%">
<thead>
<tr>
<th>ID</th>
<th>Title</th>
<th>Category</th>
<th>Quantity</th>
<th>Price per book</th>
<th>Total</th>
<th colspan="3">Action</th>
</tr>
</thead>
<tbody>
@foreach($orders as $order)
@if($order->status == 0 && $order->customer_id == Auth::id())
<tr>
<td>{{$order->order_id}}</td>
<td>{{$order->title}}</td>
<td>{{$order->category}}</td>
<td>{{$order->quantity}}</td>
<td>{{$order->price}}</td>
<td>{{$order->total_payable}}</td>


<td>

<form class="form-horizontal" method="POST"
  action="{{route('orders.update', $order->order_id)}}" enctype="multipart/form-data">
@csrf
<input name="quantity_override" type="number" min="1" max="{{$order->stock}}" placeholder="current amount = {{$order->quantity}}">
<button class="btn btn-primary" type="submit">update</button>
@method('PATCH')
</form>
</td>
<td>
  <form class="form-horizontal" method="POST"
    action="{{route('orders.update', $order->order_id)}}" enctype="multipart/form-data">
  @method('PATCH')
  @csrf
  <input type="hidden" name="add_to_cart" value="1">
  <button class="btn btn-primary" type="submit">check out</button>
  </form>
</td>
<td><form action="{{route('orders.destroy', $order->order_id)}}"
method="post">
 @csrf
<input name="_method" type="hidden" value="DELETE">
<button class="btn btn-danger" type="submit">Delete</button>
</form></td>
</tr>
</tr>
@endif
@endforeach
</tbody>
</table>
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
</div>
@endsection
