@extends('admin.layout.app')
@section('page-title', 'Edit Image')

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.galary') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.galary.update') }}" method="post" enctype="multipart/form-data">
                            @csrf

                          
                         

                           
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Image *</label>
                                    <img src="{{asset('galary_uploads')}}/{{ $data->image}}" alt="no-image" height="110px" width="110px" class="img-thumbnail" id="img">
                                    <input type="file" class="form-control" name="image" id="image" onchange="updateImg(event)">
                                
                                    @error('image') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                          
                        </div>



                        </div>

                            <input type="hidden" name="id" value="{{$data->id}}">
                            <input type="hidden" name="old_img_path" value="{{$data->image}}">
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