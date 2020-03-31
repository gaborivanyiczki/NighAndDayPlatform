@extends('layouts.app')

@section('content')


<!-- breadcrumb start -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2>noutati</h2></div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">acasa</a></li>
                        <li class="breadcrumb-item active">noutati</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->



<!-- section start -->
<section class="section-b-space blog-page ratio2_3">
    <div class="container">
        <div class="row">
            <!--Blog sidebar start-->
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="blog-sidebar">
                    <div class="theme-card">
                        <h4>Produse Noi</h4>
                        <ul class="recent-blog">
                            <li>
                                <div class="media"><img class="img-fluid blur-up lazyload" src="{{ URL::to('/') }}/images/blog/1.jpg" alt="Generic placeholder image">
                                    <div class="media-body align-self-center">
                                        <h6>25 Dec 2018</h6>
                                        <p>0 hits</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media"><img class="img-fluid blur-up lazyload" src="{{ URL::to('/') }}/images/blog/2.jpg" alt="Generic placeholder image">
                                    <div class="media-body align-self-center">
                                        <h6>25 Dec 2018</h6>
                                        <p>0 hits</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media"><img class="img-fluid blur-up lazyload" src="{{ URL::to('/') }}/images/blog/3.jpg" alt="Generic placeholder image">
                                    <div class="media-body align-self-center">
                                        <h6>25 Dec 2018</h6>
                                        <p>0 hits</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media"><img class="img-fluid blur-up lazyload" src="{{ URL::to('/') }}/images/blog/4.jpg" alt="Generic placeholder image">
                                    <div class="media-body align-self-center">
                                        <h6>25 Dec 2018</h6>
                                        <p>0 hits</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media"><img class="img-fluid blur-up lazyload" src="{{ URL::to('/') }}/images/blog/5.jpg" alt="Generic placeholder image">
                                    <div class="media-body align-self-center">
                                        <h6>25 Dec 2018</h6>
                                        <p>0 hits</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="theme-card">
                        <h4>Noutati Evidentiate</h4>
                        <ul class="popular-blog">
                            <li>
                                <div class="media">
                                    <div class="blog-date"><span>03 </span><span>may</span></div>
                                    <div class="media-body align-self-center">
                                        <h6>Injected humour the like</h6>
                                        <p>0 hits</p>
                                    </div>
                                </div>
                                <p>it look like readable English. Many desktop publishing text.</p>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="blog-date"><span>03 </span><span>may</span></div>
                                    <div class="media-body align-self-center">
                                        <h6>Injected humour the like</h6>
                                        <p>0 hits</p>
                                    </div>
                                </div>
                                <p>it look like readable English. Many desktop publishing text.</p>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="blog-date"><span>03 </span><span>may</span></div>
                                    <div class="media-body align-self-center">
                                        <h6>Injected humour the like</h6>
                                        <p>0 hits</p>
                                    </div>
                                </div>
                                <p>it look like readable English. Many desktop publishing text.</p>
                            </li>
                            <li>
                                <div class="media">
                                    <div class="blog-date"><span>03 </span><span>may</span></div>
                                    <div class="media-body align-self-center">
                                        <h6>Injected humour the like</h6>
                                        <p>0 hits</p>
                                    </div>
                                </div>
                                <p>it look like readable English. Many desktop publishing text.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--Blog sidebar start-->
            <!--Blog List start-->
            <div class="col-xl-9 col-lg-8 col-md-7 order-sec">
                <div class="row blog-media">
                    <div class="col-xl-6">
                        <div class="blog-left">
                            <a href="#"><img src="{{ URL::to('/') }}/images/blog/1.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="blog-right">
                            <div>
                                <h6>25 January 2018</h6><a href="#"><h4>you how all this mistaken idea of denouncing pleasure and praising pain was born.</h4></a>
                                <ul class="post-social">
                                    <li>Posted By : Admin Admin</li>
                                    <li><i class="fa fa-heart"></i> 5 Hits</li>
                                    <li><i class="fa fa-comments"></i> 10 Comment</li>
                                </ul>
                                <p>Consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row blog-media">
                    <div class="col-xl-6">
                        <div class="blog-left">
                            <a href="#"><img src="{{ URL::to('/') }}/images/blog/2.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="blog-right">
                            <div>
                                <h6>25 January 2018</h6><a href="#"><h4>you how all this mistaken idea of denouncing pleasure and praising pain was born.</h4></a>
                                <ul class="post-social">
                                    <li>Posted By : Admin Admin</li>
                                    <li><i class="fa fa-heart"></i> 5 Hits</li>
                                    <li><i class="fa fa-comments"></i> 10 Comment</li>
                                </ul>
                                <p>Consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row blog-media">
                    <div class="col-xl-6">
                        <div class="blog-left">
                            <a href="#"><img src="{{ URL::to('/') }}/images/blog/3.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="blog-right">
                            <div>
                                <h6>25 January 2018</h6><a href="#"><h4>you how all this mistaken idea of denouncing pleasure and praising pain was born.</h4></a>
                                <ul class="post-social">
                                    <li>Posted By : Admin Admin</li>
                                    <li><i class="fa fa-heart"></i> 5 Hits</li>
                                    <li><i class="fa fa-comments"></i> 10 Comment</li>
                                </ul>
                                <p>Consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row blog-media">
                    <div class="col-xl-6">
                        <div class="blog-left">
                            <a href="#"><img src="{{ URL::to('/') }}/images/blog/4.jpg" class="img-fluid blur-up lazyload bg-img" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="blog-right">
                            <div>
                                <h6>25 January 2018</h6><a href="#"><h4>you how all this mistaken idea of denouncing pleasure and praising pain was born.</h4></a>
                                <ul class="post-social">
                                    <li>Posted By : Admin Admin</li>
                                    <li><i class="fa fa-heart"></i> 5 Hits</li>
                                    <li><i class="fa fa-comments"></i> 10 Comment</li>
                                </ul>
                                <p>Consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Blog List start-->
        </div>
    </div>
</section>
<!-- Section ends -->


@endsection
