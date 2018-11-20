<div class="accordion" id="accordionExample">
    @foreach($categories as $category)
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#kategoria{{$category->id}}">
                    {{$category->name}}
                </button>
            </h5>
        </div>

        <div id="kategoria{{$category->id}}" class="collapse" data-parent="#accordionExample">
            <div class="card-body">
                <div class="button-group-vertical">
                    @foreach($subcategories as $sc)
                        @if($sc->category == $category)
                        <a class="btn btn-secondary btn-block" href="/catalog/{{$sc->id}}">{{$sc->name}}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>