@extends('login')
@section('title', 'Sign up')
@section('content')
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">{{ trans('login.signup_title') }}</h2>
                <form action="{{ route('signup') }}" method="POST" class="register-form" id="register-form">
                    @csrf
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="name" placeholder="{{ trans('login.name') }}"/>
                    </div>
                    @if ($errors->has('name'))
                        <div class="form-group">
                            <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="{{ trans('login.email') }}"/>
                    </div>
                    @if ($errors->has('email'))
                        <div class="form-group">
                            <p class="alert alert-danger">{{ $errors->first('email') }}</p>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="pass" placeholder="{{ trans('login.password') }}"/>
                    </div>
                    @if ($errors->has('password'))
                        <div class="form-group">
                            <p class="alert alert-danger">{{ $errors->first('password') }}</p>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" name="re_pass" id="re_pass" placeholder="{{ trans('login.again_pass') }}"/>
                    </div>
                    @if ($errors->has('re_pass'))
                        <div class="form-group">
                            <p class="alert alert-danger">{{ $errors->first('re_pass') }}</p>
                        </div>
                    @endif

                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="{{ trans('login.signup_button') }}"/>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="{{ asset('bower_components/review_travel/images/signup-image.jpg') }}" alt="sing up image"></figure>
            </div>
        </div>
    </div>
</section>
@endsection
