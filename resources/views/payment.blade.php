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
        <a class="btn btn-primary rounded-circle" href="#">
            3
        </a>
    </div>
    <div class="col d-flex justify-content-center">
        <a class="btn btn-outline-primary rounded-circle" href="/order/summary">
            4
        </a>
    </div>
</div>
<h1>Spôsob platby</h1>
<form class="form-inline" action="" method="POST">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <select class="form-control" id="platba">
        @foreach($paymentOpts as $opt)
            <option>{{$opt->name}} - {{$opt->price}} €</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary mb-2">OK</button>
</form>
<div class="row">
    <div class="col text-right celkova-cena">
        Celková cena: 1778 €
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
        <a href="/order/summary" class="btn btn-primary">
            Ďalej
            <img src="{{asset('img/arrow-24-16.png')}}">
        </a>
    </div>
</div>
@endsection