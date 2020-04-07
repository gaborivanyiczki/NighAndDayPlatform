
<!-- Technologies -->
<div class="container">
    <section class="section-b-space border-section border-top-0">
        <div class="row">
            <div class="col">
                <div class="title3">
                    <div class="line"></div>
                </div>
                <div class="slide-6 no-arrow">

                    @empty ($data)
                    <div class="category-block">
                        <a href="#">
                            <div class="category-image" style="height: 100%;"><img src="{{ URL::to('/') }}/images/uploads/technologies/nature-1.jpg" alt=""></div>
                        </a>
                        <div class="category-details">
                            <a href="#">
                                <h5>Undefined</h5>
                            </a>
                        </div>
                    </div>
                    @else
                        @foreach (json_decode($data, true) as $brand)
                        <div class="category-block">
                            <a href="{{ route('brand.details', ['slug' => $brand['Slug']]) }}">
                                <div class="category-image" style="height: 100%;">
                                    <img src="{{ URL::to('/') }}/images/uploads/{!! $brand['Path'] !!}/{!! $brand['Image'] !!}" alt="">
                                </div>
                            </a>
                            <div class="category-details">
                                <a href="{{ route('brand.details', ['slug' => $brand['Slug']]) }}">
                                    <h5>{!! $brand['Name'] !!}</h5>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    @endempty

                </div>
            </div>
        </div>
    </section>
</div>
<!-- Technologies end -->
