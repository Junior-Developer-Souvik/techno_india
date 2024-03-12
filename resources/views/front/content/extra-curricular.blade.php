@extends('front.layout.app')

@section('page-title', $extraCurricular->page_title)
@section('meta-title', $extraCurricular->meta_title)
@section('meta-description', $extraCurricular->meta_desc)
@section('meta-keywords', $extraCurricular->meta_keyword)
@section('section')
{{-- {{dd($extraCurricular)}} --}}
<section class="innerbanner" style="background-image: url('./images/innerbanner1.jpg')">
    <div class="container">
        <div class="inner_bannercont">
            <h1 class="mb-0 text-uppercase">Extra Curricular</h1>
        </div>
    </div>
</section>

<section class="innerpage_firstcont">
    <div class="container">
        <div class="row py-5 justify-content-center">
            <div class="col-lg-12 col-md-12">
                <h1 class="text_blue">{{$extraCurricular->title}}</h1>
                <span class="line_border"></span>
                <p>{{$extraCurricular->desc}}</p>
            </div>
        </div>
    </div>
</section>
@endsection