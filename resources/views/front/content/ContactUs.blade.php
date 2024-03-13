@extends('front.layout.app')

@section('page-title', $ContactUs->page_title)
@section('meta-title', $ContactUs->meta_title)
@section('meta-description', $ContactUs->meta_desc)
@section('meta-keywords', $ContactUs->meta_keyword)
@section('section')
{{-- {{dd($ContactUs)}} --}}
{{-- <section class="innerbanner" style="background-image: url('./images/innerbanner1.jpg')"> --}}
    <section class="innerbanner">
    <div class="container">
        <div class="inner_bannercont">
            <h1 class="mb-0 text-uppercase">Contact</h1>
        </div>
    </div>
</section>


<section class="contact py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 pr-lg-5">
                <div class="address_cont">
                    <h3 class="text_blue mb-3">Locate Us at</h3>
                    <p class="mr-lg-5"><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>{{$ContactUs->address}}</p>
                </div>
                <div class="address_cont mt-4 contact_box">
                    <h3 class="text_blue mb-2">Contact Us</h3>
                    <p class="mb-0"> <a href="#">{{$ContactUs->mobile_number_1}}</a></p>
                    <p class="mb-0"> <a href="#">{{$ContactUs->mobile_number_2}}</a></p>
                    <p class="mb-0"> <a href="#">{{$ContactUs->email}}</a></p>
                    <p class="mb-0"> <a href="#">{{$ContactUs->address}}</a></p>
                  
                </div>

                <div class="address_cont mt-4 contact_box">
                    <h3 class="text_blue mb-3">Engage with Us on</h3>
                    <div class="social_media mt-3">
                        <ul class="ml-0 pl-0">
                            @foreach ($SocialMedia as $item)
                            <li><a href="{{$item->link}}" target="_blank"><img src="{{asset($item->image)}}" alt="no-image" width="25px" >{{$item->title}}</a></li>
                           
                             {{-- <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li> 
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li> --}}
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-lg-0 mt-md-0 mt-5">
                <div class="contact_form">
                    <h3 class="text_blue mb-4">How Can We Assist?</h3>
                    <form class="row" id="contactForm" >
                        @csrf
                        <div class="form-group col-md-12">
                          <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name">
                      </div>
                      <div class="form-group col-md-12">
                        <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="Call Back Number">
                      </div>
                      <div class="form-group col-md-12">
                        <textarea class="form-control" name="message" id="message" rows="4" placeholder="Purpose / Message"></textarea>
                      </div>
                      <div class="col-md-7">
                          <div class="g-recaptcha" data-sitekey="6LePFpcpAAAAAGUkShiTDcvoCaFBjQ_ryYhaf57k"></div>
                      </div>
                      <div class="col-md-5 text-right">
                          <button  class="apply_now btn btn-info" id="btn">Submit</a>
                      </div>
                    </form>
                    <div id="message"></div>
                    <div id="errors" style="color: red;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

   @section('script')
       <script>
      


           $(document).ready(function () {
        $('#contactForm').submit(function (e) {
        e.preventDefault();
        // alert('test');

        $.ajax({
            url:"{{url('store')}}",
            type:'POST',
            data:$(this).serialize(),
            success:function(response,status){
                $('#contactForm')[0].reset();
                console.log(response);
                console.log(status);
            },
            error:function(xhr){
                $('#errors').html('');
                //Display Validation error
                $.each(xhr.responseJSON.error,function(key,value){
                    $('#errors').append('<p>'+ value +'</p>');
                });
            }
        });
        // $.ajax({
        //     url: "{{url('store')}}",
        //     type: 'POST',
        //     data: $(this).serialize(),
        //     success: function (response) {
        //         // alert(response.message); // Show success message
        //         // $('#errors').html(''); // Clear any previous errors
        //         console.log(response);
        //         $('#contactForm')[0].reset(); // Reset form fields
        //     },
        //     error: function (xhr) {
        //         $('#errors').html(''); // Clear any previous errors

        //         // Display validation errors
        //         $.each(xhr.responseJSON.errors, function (key, value) {
        //             $('#errors').append('<p>' + value + '</p>');
        //         });
        //     }
        // });
    });
});
//        </script>
   @endsection
@endsection
