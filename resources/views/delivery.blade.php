@extends('layout.app')

@section('content')
<div class="row">
    <div class="col d-flex justify-content-center">
        <a class="btn btn-primary rounded-circle" href="/cart">
            1
        </a>
    </div>
    <div class="col d-flex justify-content-center">
        <a class="btn btn-primary rounded-circle" href="#">
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
<h1>Výber dopravy</h1>
<form class="form-inline" action="" method="POST">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <select class="form-control" id="doprava">
        @foreach($deliveryOpts as $opt)
            <option>{{$opt->name}} - {{$opt->price}} €</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary mb-2">OK</button>
</form>
<div id="adresa">
    <form>
        <div class="form-group">
            <label for="obec">Obec</label>
            <input type="text" class="form-control" id="obec" placeholder="Obec">
        </div>
        <div class="form-group">
            <label for="ulica">Ulica a číslo</label>
            <input type="text" class="form-control" id="ulica" placeholder="Ulica a číslo">
        </div>
        <div class="form-group">
            <label for="psc">PSČ</label>
            <input type="text" class="form-control" id="psc" placeholder="PSČ">
        </div>
    </form>
</div>
<div class="row">
    <div class="col text-right celkova-cena">
        Celková cena: 1778 €
    </div>
</div>
<div class="row">
    <div class="col">
        <a href="/cart" class="btn btn-secondary">
            <img src="{{asset('img/arrow-88-16.png')}}">
            Späť
        </a>
    </div>
    <div class="col text-right">
        <a href="/order/payment" class="btn btn-primary">
            Ďalej
            <img src="{{asset('img/arrow-24-16.png')}}">
        </a>
    </div>
</div>
@endsection