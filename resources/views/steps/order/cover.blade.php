<div class="row justify-content-center text-center" style="margin-top: 40px;">
    <h3>Alegeti modelul de husa</h3>
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

                                            @foreach (json_decode($step->getCovers(), true) as $item)
                                                <div class="col-lg-2 col-md-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="#"><img src="{{ URL::to('/') }}/images/uploads/{{ $item['ImagePath'] }}/{{ $item['ImageFile'] }}" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                            </div>
                                                            <div class="cart-info cart-wrap">
                                                            </div>
                                                        </div>
                                                        <div class="product-detail">
                                                            <div>
                                                                <h6>{{ $item['Name'] }}</h6>
                                                                <input id="configurator_cover" type="radio" name="configurator_cover" value="{{ $item['id'] }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

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
