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
        @if(null!==session('town'))
        <a class="btn btn-outline-primary rounded-circle" href="/order/payment">
        @else
        <a class="btn btn-outline-primary rounded-circle disabled">
        @endif
            3
        </a>
    </div>
    <div class="col d-flex justify-content-center">
        @if(null!==session('town'))
        <a class="btn btn-outline-primary rounded-circle" href="/order/summary">
        @else
        <a class="btn btn-outline-primary rounded-circle disabled">
        @endif
            4
        </a>
    </div>
</div>
<h1>Výber dopravy</h1>
<form id="deliveryForm" class="form" action="/cart/setDelivery" method="POST">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <select class="form-control" id="doprava" name="delivery_id" required>
        @foreach($deliveryOpts as $opt)
            <option value="{{$opt->id}}" @if($opt->id == $selected->id) selected @endif>{{$opt->name}} - {{$opt->price}} €</option>
        @endforeach
    </select>
    
    <div class="form-group">
        <label for="obec">Obec</label>
        <input type="text" class="form-control" id="obec" placeholder="Obec" name="town" value="{{session('town')}}" required>
    </div>
    <div class="form-group">
        <label for="ulica">Ulica a číslo</label>
        <input type="text" class="form-control" id="ulica" placeholder="Ulica a číslo" name="street" value="{{session('street')}}" required>
    </div>
    <div class="form-group">
        <label for="psc">PSČ</label>
        <input type="text" class="form-control" id="psc" placeholder="PSČ" name="zip" value="{{session('zip')}}" required>
    </div>
</form>

<div class="row">
    <div class="col text-right celkova-cena">
        Celková cena tovaru: {{$total}} €
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
        <button type="submit" form="deliveryForm" class="btn btn-primary">
            Ďalej
            <img src="{{asset('img/arrow-24-16.png')}}">
        </button>
    </div>
</div>
@endsection