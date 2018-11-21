<div class="accordion" id="accordionNav">
    @foreach($categories as $category)
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#kategoriaNav{{$category->id}}">
                    {{$category->name}}
                </button>
            </h5>
        </div>

        <div id="kategoriaNav{{$category->id}}" class="collapse" data-parent="#accordionNav">
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