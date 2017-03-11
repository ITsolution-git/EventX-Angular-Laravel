@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row" style="margin-top:0px;padding:0">
        <div class="col-md-12">
            <div id="category">
              <h4 class="text-left"><b>SUBCATEGORY</b></h4>
                @foreach($subcat as $subcategories)
                <div class="col-md-3">
                    <a href="{{route('home.showgroup', $subcategories->id)}}">
                        <img src="{{$subcategories->image_url}}" />
                        <span>{{$subcategories->name}}</span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
