@extends('pages.profile')
@section('profile')
<div class="row justify-content-center card-body">
    <div class="col-md-8">
        <div class="card card-default">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form class="ml-5 mr-5" action="{{ route('profiles.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <div class="avt-center">
                        <h3 class="card-user-avt">{{ trans('profile.user_avt') }}</h3>
                        <label>
                            @if (Auth::user()->avatar == NULL)
                                <img width="80" height="80" src="{{ asset(config('constains.avatar')) }}"
                                    class="avt-image rounded-circle" alt="{{ trans('profile.user_avt') }}" id="avt-img-edit"></label>
                            @else
                                <img width="80" height="80" src="{{ Auth::user()->avatar }}"
                                    class="avt-image rounded-circle" alt="{{ trans('profile.user_avt') }}" id="avt-img-edit"></label>
                            @endif
                        <label for="input-avt" class="m-0 rounded-pill px-4">
                            <i class="fas fa-cloud-upload-alt" aria-hidden="true" id="avt_button">{{ trans('profile.up_avt') }}</i>
                            <input id="input-avt" type="file" name="avatar" class="form-control border-0 uploat-img">
                        </label>
                    </div>
                </div>

                <div class="form-group row avt_center">
                    <p class="col-sm-3">{{ trans('profile.user_name') }}</p>
                    <input type="text" class="form-control col-sm-6" name="name"
                        value="{{ Auth::user()->name }}" >
                </div>
                @if ($errors->has('name'))
                    <div class="form-group">
                        <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                    </div>
                @endif

                <div class="form-group row avt_center">
                    <p class="col-sm-3">{{ trans('profile.cur_pass') }}</p>
                    <input type="password" class="form-control col-sm-6" name="password">
                </div>
                @if (session()->has('error_pass'))
                    <div class="alert alert-danger">
                        {{ session()->get('error_pass') }}
                    </div>
                @endif

                <div class="form-group row avt_center">
                    <p class="col-sm-3">{{ trans('profile.new_pass') }}</p>
                    <input type="password" class="form-control col-sm-6" name="new_password">
                </div>
                @if ($errors->has('new_password'))
                    <div class="form-group">
                        <p class="alert alert-danger">{{ $errors->first('new_password') }}</p>
                    </div>
                @endif

                <div class="form-group text-center">
                    <button type="submit" class="btn boxed-btn4">
                        {{ trans('profile.send') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
