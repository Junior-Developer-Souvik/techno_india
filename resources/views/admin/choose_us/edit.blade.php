@extends('admin.layout.app')
@section('page-title', 'Edit Choose us Details')

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.choose_us') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.choose_us.update') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title *</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $data->title }}">
                                @error('title') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                          <div class="form-group">
                                <label for="title">Short Description *</label>
                                <textarea type="text" class="form-control" name="short_desc" id="short_desc" >{{ $data->short_desc }}</textarea>
                                @error('short_desc') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                         

                           
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Logo *</label>
                                    <img src="{{asset('choose_us_uploads')}}/{{ $data->logo}}" alt="no-image" height="110px" width="110px" class="img-thumbnail" id="img">
                                    <input type="file" class="form-control" name="logo" id="logo" onchange="updateImg(event)">
                                
                                    @error('logo') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                          
                        </div>



                        </div>

                            <input type="hidden" name="id" value="{{$data->id}}">
                            <input type="hidden" name="old_img_path" value="{{$data->logo}}">
                         <div class="form-group pl-1">
                             <button type="submit" class="btn btn-primary">Upload</button>

                         </div>
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
@endsection