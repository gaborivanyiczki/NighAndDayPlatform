 <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-nav-center">
                    <nav id="main-nav">
                        <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                        <!-- Sample menu definition -->
                        <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                            <li>
                                <div class="mobile-back text-right">Back<i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                            </li>
                            <li>
                                <a href="{{ route('home') }}" style="color:#E8D056;">Home</a>
                            </li>
                            <li class="mega" id="hover-cls"><a href="#">Produse <div class="lable-nav">nou</div></a>
                                <ul class="mega-menu full-mega-menu">
                                    <li>
                                        <div class="container">
                                            <div class="row">
                                                <!-- Menu items start -->

                                                @if (count($menu) === 0)
                                                    <div class="col mega-box">
                                                        <div class="link-section">
                                                            <div class="menu-title">
                                                                <h5>Nu exista categorii de produse</h5></div>
                                                            <div class="menu-content">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    @foreach ($menu as $item)
                                                        <div class="col mega-box">
                                                            <div class="link-section">
                                                                <div class="menu-title">
                                                                    <h5>{{ $item->Name }}</h5>
                                                                </div>
                                                                <div class="menu-content">
                                                                    <ul>
                                                                        @foreach($item->children as $child)
                                                                            @if($child->New == 1)
                                                                                <li><a href="{{ route('categoryproducts', ['slug' => $child->Slug]) }}">{{ $child->Name }} <span class="new-tag">nou</span></a></li>
                                                                            @else
                                                                                <li><a href="{{ route('categoryproducts', ['slug' => $child->Slug]) }}">{{ $child->Name }}</a></li>
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Tehnologii</a>
                                <ul>
                                    @empty($brands)
                                    <li><a href="#">Nu exista tehnologii</a></li>
                                    @else
                                        @foreach (json_decode($brands, true) as $key => $value)
                                            @if($value['New'] == 1)
                                            <li><a href="#">{!! $value['Name'] !!} <span class="new-tag">nou</span></a></li>
                                            @else
                                            <li><a href="#">{!! $value['Name'] !!}</a></li>
                                            @endif
                                        @endforeach
                                    @endempty
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('news') }}">noutati</a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}">despre noi</a>
                            </li>
                            <li>
                                <a href="{{ route('faq') }}">faq</a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}">contact</a>
                            </li>
                            <li>
                                <a href="#" style="color: #18335B;font-weight: bold;">make your own</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
