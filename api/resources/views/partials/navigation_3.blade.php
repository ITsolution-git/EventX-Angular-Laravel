<link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="/css/navigation_3.css">

@if (Auth::guest())
<style>
    body {padding-top: 12px;}
</style>
<div class="col-md-12 btn-group" role="group">
  <div class="btn-group" role="group" aria-label="first group" style="float:right;margin-top:0px">
   <a class="btn btn-primary" href="{{ url('/login') }}" role="button" style="float:right;margin-top:15px;margin-right:10px;">Login</a>
 </div>
 <div class="btn-group" role="group" aria-label="second group" style="float:right;margin-top:0px;">
  <a class="btn btn-primary" href="{{ url('/register') }}" role="button"  style="float:right;margin-top:15px;margin-right:10px;">Register</a>
</div>
</div>

@else
<nav class="navbar navbar-default navbar-fixed-top navbar-collapse collpase" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="/img/rmd.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse pull-right" id="bs-megadropdown-tabs" style="
    padding-left: 0px;">
        <ul class="nav navbar-nav">
          <li class="home"><a href="{{ url('/home') }}"><i class="" style="color:orange"><strong>HOME</strong></i></a></li>
          <li class="dropdown mega-dropdown">
			   <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="" style="color:orange"><strong>CATEGORIES</strong></i> <span class="caret"></span></a>
				<div id="filters" class="dropdown-menu mega-dropdown-menu">
                    <div class="container-fluid2">
    				    <!-- Tab panes -->
                        <div class="tab-content">
                          <div class="tab-pane active" id="kids">
                            <ul class="nav-list list-inline">
                              @foreach($rootcat as $rootcategories)
                               <li>
                                 <a href="{{route('home.showsubcat', $rootcategories->id)}}">
                                  <img src="{{$rootcategories->image_url}}" height="100" width="100"><span>{{$rootcategories->name}}</span>
                                 </a>
                               </li>
                              @endforeach
                            </ul>
                          </div>
                        </div>
                    </div>
				</div>
			</li>
      <li class="orderstatus"><i class="" style="color:orange"><strong>ORDER:</strong> </i><b class="orderid_info">BRO-{{Session::get('order_id')}}</b><a id="switch_order" href="{{ url('/') }}"></a></li>
      <li><a href="{{route('summary.show_summary',Session::get('order_id') )}}"><i class="" style="color:orange"><strong>SUMMARY</strong>  </i><span class="badge">5</span></a></li>
      <li><a style="cursor: pointer;" href="{{ url('/logout') }}"><i class="" style="color:orange"><strong>LOGOUT </strong></i>({{ Auth::user()->name }})</a></li>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
@endif
