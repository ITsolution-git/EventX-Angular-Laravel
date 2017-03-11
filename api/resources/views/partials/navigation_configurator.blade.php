<header>
  <a href="{{ url('/home') }}" title="Logo" style="float:left;"><img id="_logo" src="/img/rmd.png" alt=""></a>
  @if (Auth::guest())
  <div class="col-md-10 btn-group" role="group">
    <div class="btn-group" role="group" aria-label="first group" style="float:right;margin-top:15px">
     <a class="btn btn-primary" href="{{ url('/login') }}" role="button" style="float:right;margin-top:15px;margin-right:10px;">Login</a>
   </div>
   <div class="btn-group" role="group" aria-label="second group" style="float:right;margin-top:15px;">
    <a class="btn btn-primary" href="{{ url('/register') }}" role="button"  style="float:right;margin-top:15px;margin-right:10px;">Register</a>
  </div>
  </div>
  @else
  <ol>
    <li style="background:#F88421 url(img/help-icon.png) no-repeat 5px 0px;"> <a id="help-fancybox" href="" style="color:#fff; padding-left:18px;">HELP</a> </li>
    <li><a href="" style="color:#F88421; font-weight:bold;">SPA</a></li>
    <li class="cartcount orderstatus">There is no item.</li>
    <li class="orderstatus">ORDER ID : <b class="orderid_info">BRO-{{Session::get('order_id')}}</b>   <a id="switch_order" href="{{ url('/') }}"> </a></li>
    <li>Welcome <a href=""><b>{{ Auth::user()->name }}</b></a> [ <a style="cursor: pointer;" href="{{ url('/logout') }}">logout</a> ]</li>

    <li class="orderstatus">
      <form method="get" action="" name="searchproduct">
        <input placeholder="Enter model#" id="headprd_search" name="q" size="15" maxlength="30" onchange="" type="text">
        <input id="hprd_searchbtn" value="search" type="submit">
      </form>
    </li>
  </ol>
  <div id="recent_items" style="display: none;">
    <h2>Recent items</h2>
    <center>
      No item in your cart
    </center>
  </div>
  <ul class="hs-menu">
    <li><a href="{{route('summary.show_summary',Session::get('order_id') )}}">Summary</a></li>
    @foreach($rootcat as $rootcategories)
    <li>
      <a href="{{route('home.showsubcat', $rootcategories->id)}}">{{$rootcategories->name}}</a>
    </li>
    @endforeach
    <li class="home"><a href="{{ url('/home') }}"> </a></li>
  </ul>
  @endif
</header>
