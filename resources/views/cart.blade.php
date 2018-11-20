@extends('layout.app')

@section('content')
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
        <a class="btn btn-outline-primary rounded-circle" href="/order/payment">
            3
        </a>
    </div>
    <div class="col d-flex justify-content-center">
        <a class="btn btn-outline-primary rounded-circle" href="/order/summary">
            4
        </a>
    </div>
</div>
<h1>Nákupný košík</h1>
@foreach($order->products as $product)
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
                <form class="form-inline" action="{{url('qty', [$order->id, $product->id])}}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="form-group mx-2">
                        <label for="qty">Počet:</label>
                        <input id="prodQty" name="qty" class="rounded" type="number" placeholder="Počet" value="{{ $product->pivot->qty }}" min="0">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">OK</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="row">
            <div class="col py-2">
                <button type="button" class="close">
                    <span>&times;</span>
                </button>
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
        Celková cena: {{$order->sum()}} €
    </div>
</div>
<div class="row">
    <div class="col text-right">
        <a class="btn btn-secondary mr-2" href="">
            Prepočítať cenu
        </a>
        <a class="btn btn-primary" href="/order/delivery">
            Objednať
        </a>
    </div>
</div>
@endsection