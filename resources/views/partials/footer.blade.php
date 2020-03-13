
<!-- footer -->
<footer class="footer-light">
    <div class="light-layout">
        <div class="container">
            <section class="small-section border-section border-top-0">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subscribe">
                            <div>
                                <h4>Aboneaza-te la newsletter</h4>
                                <p>Afli primul detalii despre lansarea produselor noi si ofertele curente.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="https://pixelstrap.us19.list-manage.com/subscribe/post?u=5a128856334b598b395f1fc9b&amp;id=082f74cbda" class="form-inline subscribe-form auth-form needs-validation" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                              target="_blank">
                            <div class="form-group mx-sm-3">
                                <input type="text" class="form-control" name="EMAIL" id="mce-EMAIL" placeholder="Email" required="required">
                            </div>
                            <button type="submit" class="btn btn-solid" id="mc-submit">aboneaza-ma</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <section class="section-b-space light-layout">
        <div class="container">
            <div class="row footer-theme partition-f">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-title footer-mobile-title">
                        <h4>about</h4>
                    </div>
                    <div class="footer-contant">
                        <div class="footer-logo" style="text-align: center;"><img src="{{ URL::to('/') }}/images/logos/logo-nightandday-2.png" alt=""></div>
                        <p>{!! $data ? $data[2]->Value : 'Undefined'  !!}</p>
                        <div class="footer-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col offset-xl-1">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>Servicii Clienti</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <li><a href="#">Modalitati de plata</a></li>
                                <li><a href="#">Conditii retur</a></li>
                                <li><a href="#">Garantie & Service</a></li>
                                <li><a href="#">Informatii livrare</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>Informatii legale</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <li><a href="#">Termeni & conditii</a></li>
                                <li><a href="#">Politica cookies</a></li>
                                <li><a href="#">Protectia datelor cu caracter personal GDPR</a></li>
                                <li><a href="https://anpc.ro/">ANPC</a></li>
                                <li><a href="https://ec.europa.eu/consumers/odr/main/index.cfm">ODR</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>Informatii Companie</h4>
                        </div>
                        <div class="footer-contant">
                            <ul class="contact-list">
                                <li><i class="fa fa-map-marker"></i>{!! $data ? $data[3]->Value : 'Undefined'  !!}</li>
                                <li><i class="fa fa-phone"></i>{!! $data ? $data[4]->Value : 'Undefined'  !!}</li>
                                <li><i class="fa fa-envelope-o"></i>{!! $data ? $data[5]->Value : 'Undefined'  !!}</li>
                                <li><i class="fa fa-fax"></i>{!! $data ? $data[6]->Value : 'Undefined'  !!}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="footer-end">
                        <p style="color:#18335B;font-weight:bold;"><i class="fa fa-copyright" aria-hidden="true"></i> 2020 Copyright Night&Day. Website powered by YesAgency</p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="payment-card-bottom">
                        <ul>
                            <li>
                                <a href="#"><img src="{{ URL::to('/') }}/images/icon/visa.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ URL::to('/') }}/images/icon/mastercard.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ URL::to('/') }}/images/icon/paypal.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ URL::to('/') }}/images/icon/american-express.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ URL::to('/') }}/images/icon/discover.png" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->