@extends('layouts.layout')
@section('content')

<div class="container" style="margin-top:60px;padding:0">
  <div class="row">
    <div class="col-md-10">
    <h4>Search Results</h4>
    <hr />
    <table class="table table-inverse table-bordered">
      <thead class="thead-default" style="background:#668;">
        <tr>
          <th>#</th>
          <th>Order Number</th>
          <th>Create Date</th>
          <th>Actio</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td colspan="4">Your Search Criteria Returned No Results</td>
        </tr>
      </tbody>
    </table>
    </div>
  </div>
</div>
@endsection
