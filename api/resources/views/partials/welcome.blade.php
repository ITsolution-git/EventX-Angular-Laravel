@section('content')
@if (Auth::guest())
<div class="container">
  <div class="row col-md-12" style="margin-top:20px;padding:0">
  </div>
</div>
@else
<style>
#footer{
  position:fixed;
    height:50px;
    bottom:0px;
    left:0px;
    right:0px;
    margin-bottom:0px;
}
</style>
<div class="container">
  <div class="row" style="margin-top:0px;padding:0">
    <div class="col-md-10 col-xs-4">
      @if ( session()->has('message') )
        <div class="col-md-12 col-xs-12" style="margin-top:5px;padding:0">
            <div class="alert alert-success alert-dismissable">{{ session()->get('message') }}
              <a href="#" class="close" data-dismiss="alert">&times;</a>
            </div>
        </div>
        <br />
      @endif
        <div class="col-md-2 col-xs-12">
          <p>
            <button type="button" class="btn btn-primary" id="new-order-btn">Create New Order</button>
          </p>
        </div>
        <div class="col-md-8 col-xs-12">
              <form class="form-inline">
              {{ csrf_field() }}
              <div class="form-group">
                    <select  class="form-control" id="search-by">
                      <option value="0">Select Existing Order</option>
                      <option value="order_id">Order ID</option>
                    </select>
                </div>
                <div class="form-group">
                      <input type="text" id="search-value" class="form-control" />
                      <input type="hidden" id="token" value="{{ csrf_token() }}">
                </div>
                      <button type="submit" class="btn btn-primary" id="search-order">Search Order</button>
                </form>
            </div>
              <div class="col-md-4" id="loaderImage" style="display:none;align:center">
                <img src='/img/ajax-loader.gif' width="40" height="40" />
              </div>
          </div>
        </div>

        <div class="col-md-12" id="search-customer-info" style=" display:none; margin-top:40px;" >
          <div class="row">
            <div class="col-md-6">
              <form class="form-inline">
                <select class="form-control" id="search-cust">
                    <option selected value="0">Search Customer By</option>
                    <option value="phone">Telephone</option>
                    <option value="email">Email</option>
                    <option value="lead_id">Lead ID</option>
                  </select>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                  <input type="text" class="form-control" id="customer-search-criteria" placeholder="">
                  <input type="hidden" id="token" value="{{ csrf_token() }}">
                  <input type="hidden" id="companyId" value="4">
                </div>
                <button type="submit" class="btn btn-primary" id="search-for-customer">Search</button>
              </form>
            </div>
            <div class="col-md-3 col-xs-4">
            <div class="col-md-4" id="loaderImage2" style="display:none;align:center">
             <img src='/img/ajax-loader.gif' width="40" height="40" />
            </div>
            </div>
          </div>
         </div>
          <div class="row">
            <div class="col-md-12 col-xs-4">
              <div id="search-option-error"> </div>
              <div id="show-search-result-existingorder"> </div>
                <p>

                </p>
              <div id="show-search-result-neworder" style=" display:none; margin-top:40px;"> </div>
            </div>
          </div>
        </div>
@endif
@endsection
@section('jsfile')
  <script src="/js/search.js"></script>
@endsection
