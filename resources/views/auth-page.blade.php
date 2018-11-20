@extends('layout.app')

@section('content')
@yield('login')
<button type="button" class="btn btn-secondary" data-toggle="collapse" data-target="#registracia">
    Registrácia
</button>
<div class="collapse" id="registracia">
    @include('auth.register')
</div>
@endsection