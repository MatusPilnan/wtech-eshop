@extends('layout.app')

@section('content')
@if(empty(session('cart', array())))
<h1>Nákupný košík je prázdny</h1>
@else
<div class="row">
    <div class="col d-flex justify-content-center">
        <a class="btn btn-primary rounded-circle" href="#">
            1
        </a>
    </div>
    <div class="col d-flex justify-content-center">
        <a class="btn btn-outline-primary rounded-circle" href="/order/delivery">
            2
        </a>
    </div>
    <div class="col d-flex justify-content-center">
        @if(null!==session('town'))
        <a class="btn btn-outline-primary rounded-circle" href="/order/payment">
        @else
        <a class="btn btn-outline-primary rounded-circle disabled">
        @endif
            3
        </a>
    </div>
    <div class="col d-flex justify-content-center">
        @if(null!==session('town') && null!==session('payment'))
        <a class="btn btn-outline-primary rounded-circle" href="/order/summary">
        @else
        <a class="btn btn-outline-primary rounded-circle disabled">
        @endif
            4
        </a>
    </div>
</div>
<h1>Nákupný košík</h1>
@foreach($products as $product)
<div class="row align-items-center border">
    <div class="col-2 pl-0">
        <img class="d-block w-100" src="{{ asset($product->mini()->file) }}" alt="{{$product->name}}">
    </div>
    <div class="col">
        <div class="row">
            <div class="col py-2">
                {{$product->name}}
            </div>
        </div>
        <div class="row">
            <div class="col py-2">
                <form class="form-inline" action="{{url('cart/qty')}}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="form-group mx-2">
                        <label for="qty">Počet:</label>
                        <input id="prodQty" name="qty" class="rounded" type="number" placeholder="Počet" value="{{ $cart[$product->id] }}" min="1">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">OK</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="row">
            <div class="col py-2">
                <form action="{{url('cart/remove')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <button type="submit"  class="close">
                        <span>&times;</span>
                    </button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col py-2 text-right">
                {{$product->price}} €/ks
            </div>
        </div>
    </div>
</div>
@endforeach
<div class="row">
    <div class="col text-right celkova-cena">
        Celková cena: {{$total}} €
    </div>
</div>
<div class="row">
    <div class="col text-right">
        <a class="btn btn-primary" href="/order/delivery">
            Objednať
        </a>
    </div>
</div>
@endif
@endsection
