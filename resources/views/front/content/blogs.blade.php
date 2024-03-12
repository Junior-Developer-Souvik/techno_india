@extends('front.layout.app')

{{-- @section('page-title', $blogs->page_title)
@section('meta-title', $blogs->meta_title)
@section('meta-description', $blogs->meta_desc)
@section('meta-keywords', $blogs->meta_keyword) --}}
@section('section')
{{-- {{dd($blogs)}} --}}
{{-- {{dd($faculty)}} --}}
<section class="innerbanner" style="background-image: url('./images/innerbanner1.jpg')">
    <div class="container">
        <div class="inner_bannercont">
            <h1 class="mb-0 text-uppercase">Blogs</h1>
        </div>
    </div>
</section>

<section class="innerpage_firstcont">
    <div class="container">
        <div class="row pb-5">
            <div class="col-lg-8 col-md-12">
                <div class="blog_list mb-lg-5 mb-md-5 mb-4">
                    @foreach ($blogs as $item)
                        
                    <div class="blogimg">
                        <img src="{{asset('blogs.uploads')}}/{{$item->image}}" class="img-fluid" alt="no-image" >
                        <p class="blog_name"><img src="images/blognamebg1.jpg" class="img-fluid mr-3" alt="">Rajesh Sing<span></span></p>
                    </div>
                    <div class="blog_listcont">
                        <h3 class="text_blue mt-5 mb-3">{{$item->title}}</h3>
                        <p>{{$item->short_desc}}</p>
                        <p class="vies_text mt-4"><span class="text1"><i class="fa fa-eye" aria-hidden="true"></i> 100 Views</span> | <span class="text2"><i class="fa fa-comments-o" aria-hidden="true"></i> 30 Comments</span> | <span class="text3"><i class="fa fa-calendar mr-1" aria-hidden="true"></i> 24th June 2023</span></p>
                    </div>
                    @endforeach

                </div>
                <div class="blog_list mb-lg-5 mb-md-5 mb-4">
                    <div class="blogimg">
                        <img src="images/blog_listbg1.jpg" class="img-fluid" alt="">
                        <p class="blog_name"><img src="images/blognamebg1.jpg" class="img-fluid mr-3" alt="">Rajesh Sing<span></span></p>
                    </div>
                    <div class="blog_listcont">
                        <h3 class="text_blue mt-5 mb-3">Lorem ipsum dolor sit amet</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                        <p class="vies_text mt-4"><span class="text1"><i class="fa fa-eye" aria-hidden="true"></i> 100 Views</span> | <span class="text2"><i class="fa fa-comments-o" aria-hidden="true"></i> 30 Comments</span> | <span class="text3"><i class="fa fa-calendar mr-1" aria-hidden="true"></i> 24th June 2023</span></p>
                    </div>
                </div>
                <div class="blog_list mb-lg-5 mb-md-5 mb-4">
                    <div class="blogimg">
                        <img src="images/blog_listbg1.jpg" class="img-fluid" alt="">
                        <p class="blog_name"><img src="images/blognamebg1.jpg" class="img-fluid mr-3" alt="">Rajesh Sing<span></span></p>
                    </div>
                    <div class="blog_listcont">
                        <h3 class="text_blue mt-5 mb-3">Lorem ipsum dolor sit amet</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                        <p class="vies_text mt-4"><span class="text1"><i class="fa fa-eye" aria-hidden="true"></i> 100 Views</span> | <span class="text2"><i class="fa fa-comments-o" aria-hidden="true"></i> 30 Comments</span> | <span class="text3"><i class="fa fa-calendar mr-1" aria-hidden="true"></i> 24th June 2023</span></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 pl-lg-5">
                <h5 class="mb-3">Filter by Category</h5>
                <select class="form-control w-100" id="exampleFormControlSelect1">
                    <option selected="" disabled="">All</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
                <br>
                <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="row event_c mt-lg-4 mt-md-4 mt-2">
                        <div class="col-md-5 col-4">
                            <img src="images/event_c1.jpg" class="img-fluid w-100" alt="">
                        </div>
                        <div class="col-md-7 col-8 pl-0">
                            <h6>Lorem ipsum dolor sit amet</h6>
                            <p class="mb-0"><i class="fa fa-calendar mr-1" aria-hidden="true"></i> 24th March 2023</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="row event_c mt-4">
                        <div class="col-md-5 col-4">
                            <img src="images/event_c1.jpg" class="img-fluid w-100" alt="">
                        </div>
                        <div class="col-md-7 col-8 pl-0">
                            <h6>Lorem ipsum dolor sit amet</h6>
                            <p class="mb-0"><i class="fa fa-calendar mr-1" aria-hidden="true"></i> 24th March 2023</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="row event_c mt-4">
                        <div class="col-md-5 col-4">
                            <img src="images/event_c1.jpg" class="img-fluid w-100" alt="">
                        </div>
                        <div class="col-md-7 col-8 pl-0">
                            <h6>Lorem ipsum dolor sit amet</h6>
                            <p class="mb-0"><i class="fa fa-calendar mr-1" aria-hidden="true"></i> 24th March 2023</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="row event_c mt-4">
                        <div class="col-md-5 col-4">
                            <img src="images/event_c1.jpg" class="img-fluid w-100" alt="">
                        </div>
                        <div class="col-md-7 col-8 pl-0">
                            <h6>Lorem ipsum dolor sit amet</h6>
                            <p class="mb-0"><i class="fa fa-calendar mr-1" aria-hidden="true"></i> 24th March 2023</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="row event_c mt-4">
                        <div class="col-md-5 col-4">
                            <img src="images/event_c1.jpg" class="img-fluid w-100" alt="">
                        </div>
                        <div class="col-md-7 col-8 pl-0">
                            <h6>Lorem ipsum dolor sit amet</h6>
                            <p class="mb-0"><i class="fa fa-calendar mr-1" aria-hidden="true"></i> 24th March 2023</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-4"><h5 class="mb-2">Popular Blogs</h5><hr class="mt-0"></div>
                <div class="col-lg-12 col-md-6">
                    <div class="row event_c mt-lg-4 mt-md-4 mt-2">
                        <div class="col-md-5 col-4">
                            <img src="images/event_c1.jpg" class="img-fluid w-100" alt="">
                        </div>
                        <div class="col-md-7 col-8 pl-0">
                            <h6>Lorem ipsum dolor sit amet</h6>
                            <p class="mb-0"><i class="fa fa-calendar mr-1" aria-hidden="true"></i> 24th March 2023</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="row event_c mt-4">
                        <div class="col-md-5 col-4">
                            <img src="images/event_c1.jpg" class="img-fluid w-100" alt="">
                        </div>
                        <div class="col-md-7 col-8 pl-0">
                            <h6>Lorem ipsum dolor sit amet</h6>
                            <p class="mb-0"><i class="fa fa-calendar mr-1" aria-hidden="true"></i> 24th March 2023</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="row event_c mt-4">
                        <div class="col-md-5 col-4">
                            <img src="images/event_c1.jpg" class="img-fluid w-100" alt="">
                        </div>
                        <div class="col-md-7 col-8 pl-0">
                            <h6>Lorem ipsum dolor sit amet</h6>
                            <p class="mb-0"><i class="fa fa-calendar mr-1" aria-hidden="true"></i> 24th March 2023</p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection