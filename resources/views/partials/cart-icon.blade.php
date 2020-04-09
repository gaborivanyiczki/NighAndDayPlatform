<div class="icon-wrapper">
    <a href="{{ route('cart') }}"><img src="{{ URL::to('/') }}/images/icon/cart.png" class="img-fluid blur-up lazyload" alt=""><i class="ti-shopping-cart"></i></a>
    @if ($data > 0)
        <span class="badge" id="cartbadge">{!! $data !!}</span>
    @else
        <span class="badge" id="cartbadge"></span>
    @endif
</div>
