{{-- @extends('admin.layout.app')
@section('page-title', 'Create Contact')

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.contact_us') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.contact_us.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                              <div class="form-group">
                                 <label for="">Mobile Number 1</label>
                                 <input type="number" name="ph1" id="ph1" class="form-control" placeholder="Enter Your Mobile number">
                                 @error('ph1') <p class="small text-danger">{{ $message }}</p> @enderror

                              </div>

                              <div class="form-group">
                                <label for="">Mobile Number 2</label>
                                <input type="number" name="ph2" id="ph2" class="form-control" placeholder="Enter your alternate mobile number">
                                @error('ph2') <p class="small text-danger">{{ $message }}</p> @enderror

                              </div>

                              <div class="form-group">
                                <label for="">Email Id</label>
                                <input type="number" name="email" id="email" class="form-control" placeholder="Enter your email id">
                                @error('email') <p class="small text-danger">{{ $message }}</p> @enderror

                              </div>

                              <div class="form-group">
                                <label for="">Address</label>
                                <textarea type="number" name="address" id="address" class="form-control" rows="5" cols="4" placeholder="Enter your address"></textarea>
                                @error('address') <p class="small text-danger">{{ $message }}</p> @enderror

                              </div>



                            
                            
                         
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
    <script>
        checkCatParentLevel();
    </script>
@endsection --}}