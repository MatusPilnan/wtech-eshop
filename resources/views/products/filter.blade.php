<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filtreModal">
    Zoradiť a filtrovať
</button>
<div class="modal fade" id="filtreModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Zoradiť a filtrovať</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="filter" method="GET" action="">
                        <div class="row py-2 border-bottom">
                            <div class="col-6">
                                <h5>Zoradenie</h5>
                            </div>
                            <div class="col-6">
                                <select name="order" class="form-control">
                                    <option value="0" @if($order==0) selected @endif>Abecedne</option>
                                    <option value="1" @if($order==1) selected @endif>Od najdrahsieho</option>
                                    <option value="2" @if($order==2) selected @endif>Od najlacnejsieho</option>
                                </select>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-12">
                                <h5>Značka</h5>
                                <select class="form-control" id="znacka" name="manufacturer_id">
                                    @foreach($manufacturers as $opt)
                                        <option value="{{$opt->id}}" @if($opt->id == $manufacturer_id) selected @endif>{{$opt->name}}</option>
                                    @endforeach
                                </select>                                
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col">
                                <h5>Cena</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <input type="number" placeholder="Od" min="0">
                            </div>
                            <div class="col-6">
                                <input type="number" placeholder="Do" min="0">
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a href="/catalog/{{$sc->id}}" class="btn btn-secondary">Zrusit</a>
                <button type="submit" form="filter" class="btn btn-primary">Pouzit</button>
            </div>
        </div>
    </div>
</div>