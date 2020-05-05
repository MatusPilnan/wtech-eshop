@extends('layout.app')

@section('content')
<div class="row">
    <div class="col d-flex justify-content-center">
        <a class="btn btn-primary rounded-circle" href="/cart">
            1
        </a>
    </div>
    <div class="col d-flex justify-content-center">
        <a class="btn rounded-circle @if(null!==session('town')) btn-primary @else btn-danger @endif"  href="/order/delivery">
            2
        </a>
    </div>
    <div class="col d-flex justify-content-center">
        @if(null!==session('town'))
        <a class="btn btn-primary rounded-circle" href="/order/payment">
        @else
        <a class="btn btn-primary rounded-circle disabled">
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
<h1>Spôsob platby</h1>
<form class="form" id="paymentForm" action="/cart/setPayment" method="POST">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <select class="form-control" id="platba" name="payment_id">
        @foreach($paymentOpts as $opt)
            <option value="{{$opt->id}}" @if($opt->id == $selected->id) selected @endif>{{$opt->name}} - {{$opt->price}} €</option>
        @endforeach
    </select>
</form>
<div class="row">
    <div class="col text-right celkova-cena">
        Celková cena tovaru: {{$total}} €
    </div>
</div>
<div class="row">
<div class="col">
        <a href="/order/delivery" class="btn btn-secondary">
            <img src="{{asset('img/arrow-88-16.png')}}">
            Späť
        </a>
    </div>
    <div class="col text-right">
        <button type="submit" class="btn btn-primary" form="paymentForm">
            Ďalej
            <img src="{{asset('img/arrow-24-16.png')}}">
        </a>
    </div>
</div>
@endsection
