@extends('home')
@section('content')
<div class="bradcam_area"  id="title_img">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>{{ trans('post.add_img_title') }}</h3>
                    <p>{{ trans('post.opti_img') }}</p>
                    <div class="file-field big">
                        <a class="btn-floating btn-lg amber darken-2 mt-0">
                        <label for="img_title" class="m-0 rounded-pill px-4"> 
                            <i class="fas fa-cloud-upload-alt fa-3x" aria-hidden="true" id="img_button"></i>
                            <input id="img_title" type="file" class="form-control border-0 uploat_img">
                        </label>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card-body">
        <form action="{{ route('post.index') }}" method="POST">
            @csrf
            <div class="form-group">
                <h4>{{ trans('post.title') }}</h4>
            </div>
            <div class="form-group">
                <input 
                    type="text" 
                    class="form-control" 
                    placeholder="{{ trans('post.title_post') }}" 
                    name="name">
            </div>
            <div class="form-group">
                <h4>{{ trans('post.place') }}</h4>
            </div>
            <div class="form-group">
                <input 
                    type="text" 
                    class="form-control input_post" 
                    placeholder="{{ trans('post.place_review') }}">
                    <label for="prov_list">
                        <select id="prov_list" name="prov_list" class="select_prov mdb-select md-form">
                            <option value="" disabled selected>Choose province</option>
                            @foreach($provinces as $prov)
                                <option value='{{ $prov->id }}'>{{ $prov->prov_name }}</option>
                            @endforeach
                        </select>
                    </label>
            </div>
            <div class="form-group">
                <textarea 
                    name="description" 
                    placeholder="{{ trans('post.intro') }}" 
                    rows="3" 
                    class="form-control"
                    ></textarea>
            </div>
            <div class="form-group">
                <h4>{{ trans('post.para') }}</h4>
            </div>

            <div class="form-group">
                 <!-- Upload image input-->
                <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                    <input id="upload" type="file" class="form-control border-0">
                    <label id="upload-label" class="font-weight-light text-muted">{{ trans('post.choose_img') }}</label>
                    <div class="input-group-append">
                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> 
                            <i class="fa fa-cloud-upload-alt mr-2 text-muted"></i>
                            <small class="text-uppercase font-weight-bold text-muted">{{ trans('post.choose_img') }}</small></label>
                    </div>
                </div>

                <!-- Uploaded image area-->
                <p class="font-italic text-center">{{ trans('post.uploaded') }}</p>
                <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>

            </div>

            <div class="form-group">
                <textarea 
                    name="description" 
                    placeholder="{{ trans('post.content') }}" 
                    rows="5" 
                    class="form-control"
                    ></textarea>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn boxed-btn4">
                    {{ trans('post.create_button') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('script')
    <script src="{{ asset('bower_components/review_travel/js_travel/post.js') }}"></script>
    <script src="{{ asset('bower_components/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_travel/select.js') }}"></script>
@endsection
