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
<div class="container mb-3 mt-3">
<div class="card">
<div class="card-header"><h3>Finished Orders</h3></div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-striped" style="width: 100%">
<thead>
<tr>
<th>ID</th>
<th>Title</th>
<th>Category</th>
<th>Quantity</th>
<th>Total paid</th>
<th>Time of order</th>
<th colspan="3">Action</th>
</tr>
</thead>
<tbody>
@foreach($orders as $order)
@if($order->status == 1)
<tr>
<td>{{$order->order_id}}</td>
<td>{{$order->title}}</td>
<td>{{$order->category}}</td>
<td>{{$order->quantity}}</td>
<td>{{$order->total_payable}}</td>
<td>{{$order->updated_at}}</td>


<td><form action="{{route('orders.destroy', $order->order_id)}}"
method="post">
 @csrf
<input name="_method" type="hidden" value="DELETE">
<button class="btn btn-danger" type="submit">Complete order</button>
</form></td>

</tr>
</tr>
@endif
@endforeach
</tbody>
</div>
</div>
</div>
</div>
</div>
</div>


@endsection
