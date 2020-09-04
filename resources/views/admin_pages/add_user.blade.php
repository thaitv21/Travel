@extends('admin')
@section('content')
    <div class="row justify-content-center card-body">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    {{ trans('admin.add_user_header') }}
                </div>

                <div class="card-body">
                    <form action="{{ route('action_users.store') }}" method="POST" class="register-form" id="register-form">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="{{ trans('login.name') }}"/>
                        </div>
                        @if ($errors->has('name'))
                            <div class="form-group">
                                <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                            </div>
                        @endif

                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="email" placeholder="{{ trans('login.email') }}"/>
                        </div>
                        @if ($errors->has('email'))
                            <div class="form-group">
                                <p class="alert alert-danger">{{ $errors->first('email') }}</p>
                            </div>
                        @endif

                        <div class="form-group">
                            <input type="password" name="password" class="form-control" id="pass" placeholder="{{ trans('login.password') }}"/>
                        </div>
                        @if ($errors->has('password'))
                            <div class="form-group">
                                <p class="alert alert-danger">{{ $errors->first('password') }}</p>
                            </div>
                        @endif

                        <div class="form-group">
                            <input type="password" name="re_pass" class="form-control" id="re_pass" placeholder="{{ trans('login.again_pass') }}"/>
                        </div>
                        @if ($errors->has('re_pass'))
                            <div class="form-group">
                                <p class="alert alert-danger">{{ $errors->first('re_pass') }}</p>
                            </div>
                        @endif
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">
                            {{ trans('login.signup_button') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
