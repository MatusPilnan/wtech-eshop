<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#filtreModal">
    Zoradit a filtrovat
</button>
<div class="modal fade" id="filtreModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Zoradit a filtrovat</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row border-bottom">
                        <div class="col-6">
                            <h5>Zoradenie</h5>
                        </div>
                        <div class="col-6">
                            <select class="form-control">
                                <option>Abecedne</option>
                                <option>Od najdrahsieho</option>
                                <option>Od najlacnejsieho</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h5>Znacka</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="filterZnacky1">
                                <label class="form-check-label" for="filterZnacky1">Znacka</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="filterZnacky2">
                                <label class="form-check-label" for="filterZnacky2">Znacka</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="filterZnacky3">
                                <label class="form-check-label" for="filterZnacky3">Znacka</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="filterZnacky4">
                                <label class="form-check-label" for="filterZnacky4">Znacka</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h5>Vlastnosti</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="filterVlastnosti1">
                                <label class="form-check-label" for="filterVlastnosti1">Vlastnost</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="filterVlastnosti2">
                                <label class="form-check-label" for="filterVlastnosti2">Vlastnost</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="filterVlastnosti3">
                                <label class="form-check-label" for="filterVlastnosti3">Vlastnost</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="filterVlastnosti4">
                                <label class="form-check-label" for="filterVlastnosti3">Vlastnost</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h5>Cena</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <input type="number" placeholder="Od" min="0">
                        </div>
                        <div class="col-6">
                            <input type="number" placeholder="Do">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zrusit</button>
                <button type="button" class="btn btn-primary">Pouzit</button>
            </div>
        </div>
    </div>
</div>