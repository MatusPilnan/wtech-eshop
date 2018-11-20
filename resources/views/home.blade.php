@extends('layout.app')

@section('content')
<h1>Novinky</h1>
<div id="carouselNovinky" class="carousel slide border" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselNovinky" data-slide-to="0" class="active"></li>
        <li data-target="#carouselNovinky" data-slide-to="1"></li>
        <li data-target="#carouselNovinky" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <a href="produkt.html">
                <img class="d-block w-100" src="img/produkt.jpg" alt="Novinka 1" srcset="img/produkt440.jpg 440w,
                            img/produkt660.jpg 660w,
                            img/produkt1000.jpg 1000w"
                    sizes="(max-width: 576px) 440px,
                            (max-width: 992px) 660px,
                            1000px">
                <div class="carousel-caption d-none d-md-block text-primary">
                    <h5>Novinka 1</h5>
                    <p>Toto je taky mensi text dole</p>
                </div>
            </a>
        </div>
        <div class="carousel-item">
            <a href="produkt.html">
                <img class="d-block w-100" src="img/produkt.jpg" alt="Novinka 2" srcset="img/produkt440.jpg 440w,
                            img/produkt660.jpg 660w,
                            img/produkt1000.jpg 1000w"
                    sizes="(max-width: 576px) 440px,
                            (max-width: 992px) 660px,
                            1000px">
                <div class="carousel-caption d-none d-md-block text-primary">
                    <h5>Novinka 2</h5>
                    <p>Toto je taky mensi text dole</p>
                </div>
            </a>
        </div>
        <div class="carousel-item">
            <a href="produkt.html">
                <img class="d-block w-100" src="img/produkt.jpg" alt="Novinka3" srcset="img/produkt440.jpg 440w,
                        img/produkt660.jpg 660w,
                        img/produkt1000.jpg 1000w"
                    sizes="(max-width: 576px) 440px,
                        (max-width: 992px) 660px,
                        1000px">
                <div class="carousel-caption d-none d-md-block text-primary">
                    <h5>Novinka 3</h5>
                    <p>Toto je taky mensi text dole</p>
                </div>
            </a>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselNovinky" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselNovinky" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
@guest
@else
<h1>Odporúčané</h1>
<div id="carouselOdporucane" class="carousel slide border" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselOdporucane" data-slide-to="0" class="active"></li>
            <li data-target="#carouselOdporucane" data-slide-to="1"></li>
            <li data-target="#carouselOdporucane" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="produkt.html">
                    <img class="d-block w-100" src="img/produkt.jpg" alt="Odporúčané 1" srcset="img/produkt440.jpg 440w,
                                img/produkt660.jpg 660w,
                                img/produkt1000.jpg 1000w"
                        sizes="(max-width: 576px) 440px,
                                (max-width: 992px) 660px,
                                1000px">
                    <div class="carousel-caption d-none d-md-block text-primary">
                        <h5>Odporúčané 1</h5>
                        <p>Toto je taky mensi text dole</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="produkt.html">
                    <img class="d-block w-100" src="img/produkt.jpg" alt="Odporúčané 2" srcset="img/produkt440.jpg 440w,
                                img/produkt660.jpg 660w,
                                img/produkt1000.jpg 1000w"
                        sizes="(max-width: 576px) 440px,
                                (max-width: 992px) 660px,
                                1000px">
                    <div class="carousel-caption d-none d-md-block text-primary">
                        <h5>Odporúčané 2</h5>
                        <p>Toto je taky mensi text dole</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="produkt.html">
                    <img class="d-block w-100" src="img/produkt.jpg" alt="Odporúčané 3" srcset="img/produkt440.jpg 440w,
                            img/produkt660.jpg 660w,
                            img/produkt1000.jpg 1000w"
                        sizes="(max-width: 576px) 440px,
                            (max-width: 992px) 660px,
                            1000px">
                    <div class="carousel-caption d-none d-md-block text-primary">
                        <h5>Odporúčané 3</h5>
                        <p>Toto je taky mensi text dole</p>
                    </div>
                </a>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselOdporucane" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselOdporucane" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
@endguest
@endsection
