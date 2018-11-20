@extends('layout.app')

@section('content')
<div class="row">
    <div class="col">
        <h1>{{$product->name}}</h1>
        <div id="carouselProduktu" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($product->allImages()->where('thumbnail', FALSE)->where('mini', FALSE)->get() as $image)
                <li data-target="#carouselProduktu" data-slide-to="{{$loop->index}}" @if($loop->first) class="active" @endif></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
            @foreach($product->allImages()->where('thumbnail', FALSE)->where('mini', FALSE)->get() as $image)
                <div class="carousel-item @if($loop->first) active @endif">
                    <img class="d-block w-100" src="{{asset($image->file)}}" alt="Obrazok {{$loop->iteration}}">
                </div>
            @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselProduktu" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselProduktu" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-3">
        <p class="cena">
            {{$product->price}} €
        </p>
    </div>
    <div class="col-9 d-flex justify-content-end h-50">
        <form class="form-inline" action="/cart/add" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT')}}
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <input id="pocet" name="qty" class="rounded" type="number" placeholder="Počet" min="1" value="1">
            <button type="submit" class="btn btn-primary mb-2">
                <img src="{{asset('img/cart-75-16.png')}}">
                Do košíka
            </button>
        </form>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Podrobnosti</h2>
        <p>
            {{$product->long_desc}}
        </p>
    </div>
</div>
@endsection