@extends('front.layout.app')

{{-- @section('page-title', $contentacademics->page_title)
@section('meta-title', $contentacademics->meta_title)
@section('meta-description', $contentacademics->meta_desc)
@section('meta-keywords', $contentacademics->meta_keyword) --}}
@section('section')
{{-- {{dd($contentacademics)}} --}}
{{-- {{dd($SubAcademics)}} --}}


<section class="innerpage_firstcont">
    <section class="innerbanner" style="background-image: url('./images/innerbanner1.jpg')">
        <div class="container">
            <div class="inner_bannercont">
                <h1 class="mb-0 text-uppercase">Academics</h1>
            </div>
        </div>
    </section>
    
    <section class="innerpage_firstcont">
        <div class="container">
            <div class="row py-5 justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <h1 class="text_blue">{{$contentacademics->title}}</h1>
                    <span class="line_border"></span>
                    <p>{{$contentacademics->desc}}</p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="t_process py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <h1 class="text_blue">Teaching Process</h1>
                    <span class="line_border"></span>
                </div>
                <div class="col-lg-3 col-md-6 py-lg-3 py-md-2 py-1">
                    @foreach ($SubAcademics as $item)
                        
                    <div class="process_cont">
                        <img src="{{asset('sub_academics_uploads')}}/{{$item->logo}}" class="img-fluid" alt="">
                        <h5 class="mt-3">{{$item->title}}</h5>
                        <p class="">{{$item->desc}}</p>
                    </div>
                    @endforeach

                </div>
                      </div>
@endsection