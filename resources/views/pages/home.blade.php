@extends('main')
@section('content')
    <section class="fxt-template-animation fxt-template-layout35">
        <div class="fxt-content-wrap">
            <!-- The video -->
            <video autoplay muted loop id="myVideo">
                <source src="{{ asset('/') }}assets/video/grand_reunion.mp4" type="video/mp4">
            </video>
            <div class="fxt-heading-content">
                <div class="fxt-inner-wrap">
                    <div class="fxt-transformX-R-50 fxt-transition-delay-10">
                        <a href="login-33.html" class="fxt-logo"><img src="{{ asset('/') }}assets/img/logo-33.png" alt="Logo"></a>
                    </div>
                    <div class="fxt-transformX-R-50 fxt-transition-delay-10">
                        <div class="fxt-middle-content">
                            <h1 class="fxt-main-title">Alokdihi JAN Baksh High School Grand Reunion</h1>
                            <p class="fxt-description">We are glad to see you! It’s great to have you as part of the grand reunion,It's going to be a wonderful reunion. Are you ready guys? </div>
                    </div>
                    <div class="fxt-transformX-R-50 fxt-transition-delay-10">
                        <div class="d-flex align-items-center flex-wrap justify-content-between">
                            {{--<ul class="fxt-socials">
                                <li class="fxt-facebook fxt-transformY-50 fxt-transition-delay-9">
                                    <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="fxt-twitter fxt-transformY-50 fxt-transition-delay-10">
                                    <a href="#" title="twitter"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="fxt-google fxt-transformY-50 fxt-transition-delay-11">
                                    <a href="#" title="google"><i class="fab fa-google-plus-g"></i></a>
                                </li>
                                <li class="fxt-linkedin fxt-transformY-50 fxt-transition-delay-12">
                                    <a href="#" title="linkedin"><i class="fab fa-linkedin-in"></i></a>
                                </li>
                                <li class="fxt-pinterest fxt-transformY-50 fxt-transition-delay-13">
                                    <a href="#" title="pinterest"><i class="fab fa-pinterest-p"></i></a>
                                </li>
                            </ul>--}}
                            <div class="fxt-copyright-text"><a href="https://www.facebook.com/profile.php?id=100006309528521"> Developed by Md Tanvirul Islam</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fxt-form-content">
                <div class="fxt-main-form">
                    <div class="fxt-inner-wrap fxt-opacity fxt-transition-delay-13">

                        <div>
                            <!-- Progressbar -->
                            <div class="mb-5 d-grid">
                                <div class="fxt-steps">
                                    <span class="fxt-current-step"></span> of
                                    <span class="fxt-total-step"></span> completed
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-solid progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                            <!-- Form -->
                            <form action="https://affixtheme.com/html/xmee/demo/job-1-success.html" method="GET">
                                <div class="fxt-form-step">
                                    <h2 class="fxt-page-title">Personal Information</h2>
                                    <div class="form-group">
                                        <input id="name" type="text" class="form-control" name="name" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input id="email" type="tel" class="form-control" name="phone" placeholder="Phone">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-8 col-12">
                                                <span>Upload your image</span>
                                                <input id="image" type="file" accept="image/*" class="form-control" name="image">
                                            </div>
                                            <div class="col-xl-4 col-12">
                                                <input id="passing_year" type="text" class="form-control" name="passing_year" placeholder="Passing year">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="radio-wrap">
                                            <h3 class="fxt-page-title">Select Gender</h3>
                                            <div class="d-flex align-items-center gap-4">
                                                <div class="radio-box style-1">
                                                    <input class="form-check-input" type="radio" name="radio-gender" id="radio-male">
                                                    <label class="form-check-label" for="radio-male">Male</label>
                                                </div>
                                                <div class="radio-box style-1">
                                                    <input class="form-check-input" type="radio" name="radio-gender" id="radio-female" checked>
                                                    <label class="form-check-label" for="radio-female">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex align-items-center gap-2 mt-5">
                                            <input type="button" name="next" class="next fxt-btn-fill" value="Next">
                                        </div>
                                    </div>
                                </div>

                                <div class="fxt-form-step">
                                    <h2 class="fxt-page-title">Select Your T-Short Size</h2>
                                    <div class="form-group">
                                        <div class="radio-box style-2">
                                            <input id="radio-position1" name="t_shirt_size" type="radio">
                                            <label for="t_shirt_size1">SMALL</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="radio-box style-2">
                                            <input id="t_shirt_size2" name="t_shirt_size" type="radio">
                                            <label for="t_shirt_size2">MEDIUM</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="radio-box style-2">
                                            <input id="t_shirt_size3" name="t_shirt_size" type="radio">
                                            <label for="radio-position3">LARGE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="radio-box style-2">
                                            <input id="t_shirt_size4" name="t_shirt_size" type="radio">
                                            <label for="t_shirt_size4">EXTRA LARGE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex align-items-center gap-2 mt-5">
                                            <input type="button" name="previous" class="previous fxt-btn-fill" value="Previous Step">
                                            <input type="button" name="next" class="next fxt-btn-fill" value="Next">
                                        </div>
                                    </div>
                                </div>
                                <div class="fxt-form-step">
                                    <h2 class="fxt-page-title">Guest <span>( if any )</span></h2>
                                    <div class="form-group">
                                        <select id="inputCountry" class="form-control">
                                            <option value="1">1 person</option>
                                            <option value="2">2 persons</option>
                                            <option value="3">3 persons</option>
                                            <option value="4">4 persons</option>
                                            <option value="5">5 persons</option>
                                            <option value="6">6 persons</option>
                                        </select>
                                    </div>
                                    <h2 class="fxt-page-title">Select Payment Method</h2>
                                    <div class="form-group">
                                        <select id="inputCountry" class="form-control">
                                            <option value="1">Bkash</option>
                                            <option value="2">Nagod</option>
                                            <option value="3">Rocket</option>
                                            <option value="4">DBL</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-4 col-12">
                                        <input id="transaction_no" type="text" class="form-control" name="transaction_no" placeholder="Account number">
                                    </div>
                                    <div class="col-xl-4 col-12">
                                        <input id="transaction_no" type="text" class="form-control" name="transaction_no" placeholder="Transaction number">
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex align-items-center gap-2 mt-5">
                                            <input type="button" name="previous" class="previous fxt-btn-fill" value="Previous Step">
                                            <input type="button" name="next" class="next fxt-btn-fill" value="Next">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endSection
