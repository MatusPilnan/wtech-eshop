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
        <input class="rounded" type="number" placeholder="Počet" min="1">
        <a class="btn btn-primary" href="#">
            <img src="{{asset('img/cart-75-16.png')}}">
            Do košíka
        </a>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Podrobnosti</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut porttitor sapien et quam
            venenatis, ut porta mi condimentum. Suspendisse pellentesque urna eget venenatis accumsan.
            Aenean blandit massa venenatis semper mollis. Nulla pretium et turpis et semper. Etiam eget
            sollicitudin libero, eu bibendum magna. Nam ipsum metus, laoreet at libero sollicitudin,
            bibendum hendrerit elit. Integer lobortis consequat lorem, id aliquet arcu tincidunt ut.
            Phasellus id mi ac tellus sagittis fringilla et vitae magna. Morbi sagittis dui vitae
            pharetra consectetur.
        </p>
        <p>
            In laoreet eget nulla eget pretium. Cras varius diam magna, quis imperdiet metus mattis ut.
            Praesent at pulvinar est. Proin arcu ante, pellentesque vitae massa placerat, condimentum
            egestas sem. Aenean ac diam sed orci dignissim aliquam. Maecenas commodo varius nibh ut
            ultrices. Nulla ac nisi eget lectus vehicula blandit. Nunc pretium iaculis convallis. Sed
            eget sem iaculis, efficitur leo sit amet, sodales orci. Class aptent taciti sociosqu ad
            litora torquent per conubia nostra, per inceptos himenaeos. Proin libero purus, tristique
            in egestas sit amet, porttitor eu nisl. In dolor nibh, posuere in purus at, congue
            venenatis risus. Vivamus dictum, ante in imperdiet vestibulum, lectus nulla imperdiet leo,
            id laoreet nunc lacus condimentum massa. Proin quis blandit nibh, at tempus ligula. Fusce
            eu mauris placerat, consequat neque id, euismod erat.
        </p>
        <p>
            Aliquam erat volutpat. Aenean sit amet enim mattis, hendrerit felis ut, malesuada magna.
            Praesent interdum risus quis est blandit scelerisque vitae ac leo. Vivamus tempus fermentum
            luctus. Vivamus et ante tincidunt, gravida purus id, interdum lectus. Cras commodo dui et
            lacus posuere gravida. Integer non posuere ex. Nunc tempor, elit nec porta feugiat, felis
            odio aliquam elit, vel rhoncus nunc ante id turpis. Donec in scelerisque nibh. Vivamus
            mattis auctor libero, eu finibus augue tempor ut.
        </p>
    </div>
</div>
@endsection