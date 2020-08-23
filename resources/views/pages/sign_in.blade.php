@extends('login')
@section('title', 'Sign in')
@section('content')
<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="{{ asset('bower_components/review_travel/images/signin-image.jpg') }}" alt="sing up image"></figure>
                <a href="{{ route('signup') }}" class="signup-image-link">{{ trans('login.create_acc') }}</a>
            </div>
            <div class="row justify-content-center card-body">

            <div class="signin-form">
                <h2 class="form-title">{{ trans('login.signin_title') }}</h2>
                <form action="{{ route('login') }}" method="POST" class="register-form" id="login-form">
                    @csrf
                    <div class="col-md-8">
                        @if (session()->has('error_login'))
                            <div class="alert alert-danger">
                                {{ session()->get('error_login') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                    <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="text" name="email" id="your_name" placeholder="{{ trans('login.email') }}"/>
                    </div>
                    @if ($errors->has('email'))
                        <div class="form-group">
                            <p class="alert alert-danger">{{ $errors->first('email') }}</p>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="your_pass" placeholder="{{ trans('login.password') }}"/>
                    </div>
                    @if ($errors->has('password'))
                        <div class="form-group">
                            <p class="alert alert-danger">{{ $errors->first('password') }}</p>
                        </div>
                    @endif

                    <div class="form-group">
                        <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                        <label for="remember-me" class="label-agree-term"><span><span></span></span>{{ trans('login.remember') }}</label>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="{{ trans('login.login_button') }}"/>
                    </div>
                </form>
                <div class="social-login">
                    <span class="social-label">{{ trans('login.login_with') }}</span>
                    <ul class="socials">
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
