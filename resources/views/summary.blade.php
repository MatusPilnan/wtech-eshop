@extends('layout.app')

@section('content')
<div class="row">
    <div class="col d-flex justify-content-center">
        <a class="btn btn-primary rounded-circle" href="/cart">
            1
        </a>
    </div>
    <div class="col d-flex justify-content-center">
        <a class="btn btn-primary rounded-circle" href="/order/delivery">
            2
        </a>
    </div>
    <div class="col d-flex justify-content-center">
        <a class="btn btn-primary rounded-circle" href="/order/payment">
            3
        </a>
    </div>
    <div class="col d-flex justify-content-center">
        <a class="btn btn-primary rounded-circle" href="#">
            4
        </a>
    </div>
</div>
<h1>Zhrnutie objednávky</h1>
@foreach($products as $product)
<div class="row align-items-center border">
    <div class="col-1 pl-0">
        <img class="d-block w-100" src="{{asset($product->mini()->file)}}" alt="{{$product->name}}">
    </div>
    <div class="col">
        {{$product->name}}
    </div>
    <div class="col">
        {{$cart[$product->id]}}x
    </div>
    <div class="col-2 py-2 text-right">
        {{$product->price}} €
    </div>
</div>
@endforeach
<div class="row align-items-center border">
    <div class="col-1 pl-0">
        <img class="d-block w-100" src="{{asset($delivery->mini()->file)}}" alt="{{$delivery->name}}">
    </div>
    <div class="col">
        Doprava: {{$delivery->name}}
    </div>
    <div class="col">
        1x
    </div>
    <div class="col-2 py-2 text-right">
        {{$delivery->price}} €
    </div>
</div>
<div class="row align-items-center border">
    <div class="col-1 pl-0">
        <img class="d-block w-100" src="{{asset($payment->mini()->file)}}" alt="{{$payment->name}}">
    </div>
    <div class="col">
        Platba: {{$payment->name}}
    </div>
    <div class="col">
        1x
    </div>
    <div class="col-2 py-2 text-right">
        {{$payment->price}} €
    </div>
</div>
<div class="row">
    <div class="col text-right celkova-cena">
        Celková cena: {{$total + $delivery->price + $payment->price}} €
    </div>
</div>
<div class="row py-4">
    <div class="col">
        <a href="/order/payment" class="btn btn-secondary">
            <img src="{{asset('img/arrow-88-16.png')}}">
            Späť
        </a>
    </div>
    <div class="col text-right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#potvrdenie">
            Dokončiť objednávku
        </button>
    </div>
    <div class="modal fade" id="potvrdenie" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="potvrdenie">Objednávka dokončená</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Normálne by sa tu ešte išlo platiť ale takto sa len vrátime na homepage a
                    vyčistíme košíky a všetko.
                </div>
                <div class="modal-footer">
                    <a href="/order/fin" class="btn btn-primary">Dobre</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection