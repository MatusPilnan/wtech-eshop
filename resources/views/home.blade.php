@extends('layout.app')

@section('content')
<h1>Novinky</h1>
<div id="carouselNovinky" class="carousel slide border" data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($new as $product)
        <li data-target="#carouselNovinky" data-slide-to="{{$loop->index}}" @if($loop->first) class="active" @endif></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach($new as $product)
        <div class="carousel-item @if($loop->first) active @endif">
            <a href="/product/{{$product->id}}">
                <img class="d-block w-100" src="{{asset($product->allImages()->where('thumbnail', FALSE)->where('mini', FALSE)->first()->file)}}" alt="{{$product->name}}">
                <div class="carousel-caption d-none d-md-block text-primary">
                    <h5>{{$product->name}}</h5>
                    <p>{{$product->short_desc}}</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselNovinky" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselNovinky" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
@guest
@else
<h1>Odporúčané</h1>
<div id="carouselOdporucane" class="carousel slide border" data-ride="carousel">
        <ol class="carousel-indicators">
        @foreach($rec as $product)
        <li data-target="#carouselOdporucane" data-slide-to="{{$loop->index}}" @if($loop->first) class="active" @endif></li>
        @endforeach
    </ol>
    <div class="carousel-inner">
        @foreach($rec as $product)
        <div class="carousel-item @if($loop->first) active @endif">
            <a href="/product/{{$product->id}}">
                <img class="d-block w-100" src="{{asset($product->allImages()->where('thumbnail', FALSE)->where('mini', FALSE)->first()->file)}}" alt="{{$product->name}}">
                <div class="carousel-caption d-none d-md-block text-primary">
                    <h5>{{$product->name}}</h5>
                    <p>{{$product->short_desc}}</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselOdporucane" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselOdporucane" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
@endguest
@endsection
