@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-xs-4">
          <div class="alert alert-success alert-dismissable">{{ session()->get('message') }}
            <a href="#" class="close" data-dismiss="alert">&times;</a>
          </div>
          <div class="panel panel-primary">
                   <div class="panel-heading"><b>MAIN CATEGORY</b></div>
          </div>
             <div id="category">
                    @foreach($rootcat as $rootcategories)
                      <div class="col-md-3 col-xs-12">
                        <a href="{{route('home.showsubcat', $rootcategories->id)}}">
                          <img src="{{$rootcategories->image_url}}" height="200" width="200" />
                          {{$rootcategories->name}}
                        </a>
                      </div>
                    @endforeach
              </div>
            </div>
        </div>
    </div>
@endsection
