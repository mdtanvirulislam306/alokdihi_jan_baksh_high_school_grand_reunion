@extends('main')
@section('content')
    <section class="fxt-template-animation fxt-template-layout33">
        <div class="fxt-content-wrap">
            <div class="fxt-form-content">
                <div class="fxt-main-form">
                    <div class="fxt-inner-wrap fxt-opacity fxt-transition-delay-13">
                        <h2 class="fxt-page-title">Log In</h2>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="fxt-label">Email Address</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Enter your email" required="required">
                            </div>
                            <div class="form-group">
                                <label for="password" class="fxt-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Enter Password" required="required">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="fxt-btn-fill">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
