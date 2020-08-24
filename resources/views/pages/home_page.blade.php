@extends('home')
@section('content')
    <!-- where_togo_area_start  -->
    <div class="where_togo_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="form_area">
                        <h3>{{ trans('header.search_input') }}</h3>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="search_wrap">
                        <form class="search_form" action="#">
                            <div class="input_field">
                                <input type="text" placeholder="{{ trans('header.search_input') }}">
                            </div>
                            <div class="search_btn">
                                <button class="boxed-btn4 " type="submit" >{{ trans('header.search_button') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- where_togo_area_end  -->
    
    <!-- popular_destination_area_start  -->
    <div class="popular_destination_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <h3>{{ trans('home_page.travel') }}</h3>
                        <p>{{ trans('home_page.reviewing') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_destination">
                        <div class="thumb">
                            <img src="bower_components/review_travel/img_travel/destination/3.png" alt="">
                        </div>
                        <div class="content">
                            <p class="d-flex align-items-center">{{ trans('home_page.America') }} <a href="#">{{ trans('home_page.Places') }}</a> </p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_destination_area_end  -->
@endsection
