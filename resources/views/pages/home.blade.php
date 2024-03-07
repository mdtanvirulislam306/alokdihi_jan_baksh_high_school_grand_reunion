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
                            <form action="{{ route('frontend.data.store') }}" method="post" id="registrationForm" enctype="multipart/form-data">
                                @csrf
                                <div class="fxt-form-step">
                                    <h2 class="fxt-page-title">Personal Information</h2>
                                    <div class="form-group">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" >
                                    </div>
                                    <div class="form-group">
                                        <input id="email" type="tel" class="form-control" name="phone"  value="{{ old('name') }}" placeholder="Phone">
                                    </div>
                                   {{-- <div class="form-group">
                                        <div class="row">
                                            <div class=" col-12">
                                                <span>Upload your image</span>
                                                <input id="image" type="file" accept="image/*" class="form-control" name="image">
                                            </div>
                                        </div>
                                    </div>--}}
                                    <div class="col-12">
                                        <input id="passing_year" type="text" class="form-control" name="passing_year"  value="{{ old('name') }}" placeholder="Passing year">
                                    </div>
                                    <div class="form-group">
                                        <div class="radio-wrap">
                                            <h3 class="fxt-page-title">Select Gender</h3>
                                            <div class="d-flex align-items-center gap-4">
                                                <div class="radio-box style-1">
                                                    <input class="form-check-input" type="radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} id="radio-male">
                                                    <label class="form-check-label" for="radio-male">Male</label>
                                                </div>
                                                <div class="radio-box style-1">
                                                    <input class="form-check-input" type="radio" name="gender" {{ old('gender') == 'female' ? 'checked' : '' }} value="female" id="radio-female">
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
                                            <input id="t_shirt_size1" name="t_shirt_size" {{ old('t_shirt_size') == 'small' ? 'checked' : '' }} value="small" type="radio">
                                            <label for="t_shirt_size1">SMALL</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="radio-box style-2">
                                            <input id="t_shirt_size2" name="t_shirt_size" {{ old('t_shirt_size') == 'medium' ? 'checked' : '' }} value="medium" type="radio">
                                            <label for="t_shirt_size2">MEDIUM</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="radio-box style-2">
                                            <input id="t_shirt_size3" name="t_shirt_size" {{ old('t_shirt_size') == 'large' ? 'checked' : '' }} value="large" type="radio">
                                            <label for="t_shirt_size3">LARGE</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="radio-box style-2">
                                            <input id="t_shirt_size4" name="t_shirt_size" {{ old('t_shirt_size') == 'extra large' ? 'checked' : '' }} value="extra large" type="radio">
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
                                    <h4>Your registration is free of <b>500 Tk(five hundred taka)</b> if you have guests with you then an additional <b>300 Tk (Three hundred taka)</b> will be charged for each.</h4>
                                    <div class="form-group">
                                        <label for="guest">Guest <span>( if any )</span></label>
                                        <select id="guest" class="form-control" name="guest" >
                                            <option >Select</option>
                                            <option value="1" {{ old('guest') == '1' ? 'selected' : '' }}>1 person</option>
                                            <option value="2" {{ old('guest') == '2' ? 'selected' : '' }}>2 persons</option>
                                            <option value="3" {{ old('guest') == '3' ? 'selected' : '' }}>3 persons</option>
                                            <option value="4" {{ old('guest') == '4' ? 'selected' : '' }}>4 persons</option>
                                            <option value="5" {{ old('guest') == '5' ? 'selected' : '' }}>5 persons</option>
                                            <option value="6" {{ old('guest') == '6' ? 'selected' : '' }}>6 persons</option>
                                        </select>
                                        <span id="fee" class="text-primary"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="guest">Select Payment Method</label>
                                        <select class="form-control" id="payment_method" name="payment_method">
                                            <option>Select</option>
                                            @foreach($payment_methods as $key => $method)
                                            <option value="{{ $key }}" {{ old('payment_method') == $key ? 'selected' : '' }}>{{ $method }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span id="pay_instruction" class="text-primary"></span>
                                    <div class="form-group">
                                        <label for="guest">Enter Account number</label>
                                        <input id="account_no" type="text" class="form-control" name="account_no" value="{{ old('account_no') }}" placeholder="Account number">
                                    </div>
                                    <div class="form-group">
                                        <label for="guest">Enter Transaction number</label>
                                        <input id="transaction_no" type="text" class="form-control" name="transaction_no" value="{{ old('transaction_no') }}" placeholder="Transaction number">
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex align-items-center gap-2 mt-5">
                                            <input type="button" name="previous" class="previous fxt-btn-fill" value="Previous Step">
                                            <button type="submit" class="fxt-btn-fill">Register</button>
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
@section('js')
    <script>
            // Prevent default form submission
           /* $("#registrationForm").on('submit', function (e) {
                var self = this;
                e.preventDefault();
                var formData = new FormData($(self)[0]);
                console.log(formData)
                var url = $(self).attr('action');
                $.ajax({
                    url:url ,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        console.log(response);
                        // Handle success response
                    },
                    error: function (error) {
                        console.error(error);
                        // Handle error response
                    }
                });
            });
*/
            $('#guest').on('change',function(e){
                let guest = $('#guest').val()
                let fee = 500+(guest*300)
                $('#fee').text(`**You select ${guest} person. Your total fee ${fee} taka.`)

            })
            $('#payment_method').on('change',function(e){
                let payment_method = $(this).val()
                if(payment_method==1) {
                    $('#pay_instruction').text(`Please send your fee by bkash and enter account number , transaction number into below field.`)
                }else if(payment_method==2){
                    $('#pay_instruction').text(`Please send your fee by nagod and enter account number , transaction number into below field.`)
                }else{
                    $('#pay_instruction').text(`Please send your fee by rocket and enter account number , transaction number into below field.`)
                }

            })


    </script>
@endsection
