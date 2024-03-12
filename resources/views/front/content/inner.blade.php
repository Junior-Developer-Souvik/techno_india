@extends('front.layout.app')

{{-- @section('page-title', $inner->page_title)
@section('meta-title', $inner->meta_title)
@section('meta-description', $inner->meta_desc)
@section('meta-keywords', $inner->meta_keyword) --}}
@section('section')
{{dd($inner)}}
<section class="innerbanner" style="background-image: url('./images/innerbanner1.jpg')">
    <div class="container">
        <div class="inner_bannercont">
            <h1 class="mb-0 text-uppercase">Inner</h1>
        </div>
    </div>
</section>

<section class="innerpage_firstcont">
    <div class="container">
        <div class="row py-5 justify-content-center">
            <div class="col-lg-12 col-md-12">
                <h1 class="text_blue">About The School</h1>
                <span class="line_border"></span>
                <p>Techno India Group World School is conceived not just as a school but as a platform to nurture excellence in each child under its umbrella and to cultivate the nation’s dream. The origin of this can be traced back to the launch of Techno India Group Public School, more than one and a half decades ago. Our proven model speaks volumes about our passion and acceptability among Generation Y and their parents.</p>
            </div>
        </div>
    </div>
</section>
@endsection