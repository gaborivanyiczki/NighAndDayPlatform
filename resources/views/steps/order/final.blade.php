<div class="row justify-content-center text-center" style="margin-top: 40px;">
    <h3>Finalizare comanda</h3>
</div>
<!-- section start -->
<section class="section-b-space ratio_asos">
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="collection-product-wrapper">
                                    <div class="product-wrapper-grid">
                                        <div class="row">
                                            @foreach ($step->getStepsData() as $key => $value)
                                                @switch($key)
                                                    @case('sponge')
                                                        <label for="basic-url">Tip Burete</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" name="sponge" value="{{ $value }}" required readonly>
                                                        </div>
                                                        @break
                                                    @case('cover')
                                                        <label for="basic-url">Model Husa</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" name="cover" value="{{ $value }}" required readonly>
                                                        </div>
                                                        @break
                                                @endswitch
                                            @endforeach

                                            <label for="lenght">Lungime</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="lenght" value="" required>
                                                <div class="input-group-append">
                                                  <span class="input-group-text" id="lenght">cm</span>
                                                </div>
                                            </div>
                                            <label for="width">Latime</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="width" value="" required>
                                                <div class="input-group-append">
                                                  <span class="input-group-text" id="width">cm</span>
                                                </div>
                                            </div>

                                            <label for="basic-url">Cantitate</label>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" name="quantity" min="1" value="1" required>
                                            </div>
                                            <label for="observation">Observatii</label>
                                            <textarea class="form-control" id="observation" name="observation" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section End -->
