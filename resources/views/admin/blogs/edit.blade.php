@extends('admin.layout.app')
@section('page-title', 'Edit Blogs')

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.blogs.list.all') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.blogs.update') }}" method="post" enctype="multipart/form-data">
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

                          <div class="form-group">
                                <label for="title">Long Description *</label>
                                <textarea type="text" class="form-control" name="long_desc" id="long_desc" >{{ $data->long_desc }}</textarea>
                                @error('short_desc') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                           
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Image *</label>
                                    <img src="{{asset('blogs.uploads')}}/{{ $data->image}}" alt="no-image" height="110px" width="110px" class="img-thumbnail" id="img">
                                    <input type="file" class="form-control" name="image" id="image" onchange="updateImg(event)">
                                
                                    @error('image') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" style="margin-top: 53px;">
                                    <label for="title">Blog Category *</label>
                                    <input type="text" class="form-control" name="blog_cat" id="blog_cat" value="{{ $data->blog_categories }}">
                                    @error('blog_cat') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>


                            {{-- <div class="col-md-6">
                                @if (!empty($data->image))
                                    @if (!empty($data->image) && file_exists(public_path($data->image)))
                                        <img src="{{ asset('./blogs.uploads') }}/{{$data->image}}" alt="category-img" class="img-thumbnail mr-3" style="height: 50px">
                                    @else
                                        <img src="{{ asset('backend-assets/images/placeholder.jpg') }}" alt="category-image" style="height: 50px" class="mr-2">
                                    @endif
                                    <br>
                                @endif

                                <label for="image">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                                <p class="small text-muted">Size: less than 1 mb | Extension: .webp for better SEO</p>
                                @error('image') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div> --}}

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="title">Page Title *</label>
                                <input type="text" class="form-control" name="page_title" id="page_title"  value="{{ $data->page_title }}">
                                @error('page_title') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="title">Uploaded_By(Faculty) *</label>
                                 <select name="uploaded_by" id="uploaded_by" class="form-control" >
                                    <option value="" selected hidden>--Select Faculty--</option>
                                    <option value="1" {{$data->uploaded_by==1?"selected":""}}>Ms. K. Banupriya</option>
                                    <option value="2" {{$data->uploaded_by==2?"selected":""}}>Ms. S. Rajeshwari </option>
                                    <option value="3" {{$data->uploaded_by==3?"selected":""}}>Mr. R. Gunasekaran </option>
                                    <option value="4" {{$data->uploaded_by==4?"selected":""}}>Mr. B. Sudhakar </option>
                                    
                                 </select>
                                @error('uploaded_by') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>

                            <input type="hidden" name="id" value="{{$data->id}}">
                            <input type="hidden" name="old_img_blog" value="{{$data->image}}">
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