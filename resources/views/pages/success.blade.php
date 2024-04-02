@extends('main')
@section('content')
    <div class="fxt-template-layout35">
        <div class="success-page-wrap">
            <div class="container text-center d-flex align-items-center justify-content-center h-100">
                <div class="success-page-content">
                    <div class="icon-success"><i class="fas fa-check"></i></div>
                    <h2 class="title-success">Application Submitted</h2>
                    <p class="description-success">Our review team will review your application and send you a confirmation SMS with Coupon.</p>
                    <a href="{{ route('frontend.home') }}" class="fxt-btn-ghost">Back To Home</a>
                </div>
            </div>
        </div>
    </div>
@endsection
