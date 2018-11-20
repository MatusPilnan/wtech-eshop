@extends('layout.app')

@section('content')
<div class="row">
    <div class="col-6">
        <h1>{{$sc->name}}</h1>
    </div>
    <div class="col-6 d-inline-flex justify-content-end  h-50">
        @include('products.filter')
    </div>
</div>
<div class="row my-2">
    @foreach($products as $product)
    <div class="col-lg-4">
        <a href="/product/{{$product->id}}">
            <div class="card">
                <img class="card-img-top border-bottom" src="{{asset($product->thumbnail()->file)}}" alt="{{$product->name}}">
                <div class="card-body">
                    <h5 class="card-title text-primary">{{$product->name}}</h5>
                    <p class="card-text text-secondary">{{$product->short_desc}}</p>
                    <p class="cena">{{$product->price}} €</p>
                </div>
            </div>
        </a>
    </div>
    @if($loop->index % 3 == 2)
</div>
<div class="row my-2">
    @endif
    @endforeach
</div>

<div class="row my-2 justify-content-center">
    <div class="col justify-content-center">
        <nav>
            {{ $products->links() }}
            <!-- <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Predch.</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Dalsie</a>
                </li>
            </ul> -->
        </nav>
    </div>
</div>
@endsection