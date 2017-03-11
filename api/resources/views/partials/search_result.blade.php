@extends('layouts.layout')
@section('content')
<div class="container" style="margin-top:60px;padding:0">
  <div class="row">
    <div class="col-md-10">
      <h4>Search Results</h4>
    <hr />
    <table class="table table-bordered table-inverse">
      <thead class="thead-default">
        <tr style="border: 1px solid black; background-color: #EEE;">
          <th>#</th>
          <th>Order</th>
          <th>Create Date</th>
          <th>Customer Name</th>
          <th>Order Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
          <?php $i = 1; ?>
          @foreach($orders as $order)
        <tr>
          <th width="5%">{{$i++}}</th>
          <td width="15%">{{$order->order_number}}</td>
          <td width="15%">{{$order->created_at}}</td>
          <td width="25%"></td>
          <td width="15%"><button type="button" class="btn btn-primary btn-round-xs btn-xs">Submitted</button></td>
          <td width="25%">
            <div class="col-md-3">
                  <a href="{{route('orders.selectorder', $order->order_number)}}" class="btn btn-info btn-circle"><i class="glyphicon glyphicon-ok"></i></a>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
</div>
@endsection
