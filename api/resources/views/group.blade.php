@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-top:0px;padding:0">
        <div class="col-md-12">
             <div id="category">
                <h4 class="text-left"><b>PRODUCT GROUPS</b></h4>
                    @foreach($group as $groups)
                      <div class="col-md-3">
                        <a href="{{route('home.showproducts', $groups->id)}}">
                          <img src="{{$groups->image_url}}" />
                          <span>{{$groups->name}}</span>
                        </a>
                      </div>
                    @endforeach
              </div>
            </div>
        </div>
    </div>
@endsection
