@extends('admin.layout.app')
@section('page-title', 'Create Blogs')

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
                        <form action="{{ route('admin.blogs.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title *</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{ old('title') }}">
                                @error('title') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">Short Description *</label>
                                <textarea type="text" class="form-control" name="short_desc" id="short_desc" rows="4" cols="5" placeholder="write Short description">{{ old('short_desc') }}</textarea>
                                @error('short_desc') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">Long Description *</label>
                                <textarea type="text" class="form-control" name="long_desc" id="long_desc" rows="4" cols="5" placeholder="write Long description">{{ old('long_desc') }}</textarea>
                                @error('long_desc') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                           

                            <div class="form-group">
                                <label for="title">Image *</label>
                                <input type="file" class="form-control" name="image" id="image" onchange="uploadImg(event)">
                                <div id="img-preview"></div>
                                @error('image') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">Blog Categories *</label>
                                <input type="text" class="form-control" name="blog_cat" id="blog_cat" value="{{ old('blog_cat') }}" placeholder="Enter blog categories">
                                @error('blog_cat') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">Page Title *</label>
                                <input type="text" class="form-control" name="page_title" id="page_title" value="{{ old('page_title') }}"  placeholder="Enter page_title">
                                @error('page_title') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="title">Uploaded_By(Faculty) *</label>
                                 <select name="uploaded_by" id="uploaded_by" class="form-control" >
                                    <option value="" selected hidden>--Select Faculty--</option>
                                    <option value="1" >Ms. K. Banupriya</option>
                                    <option value="2" >Ms. S. Rajeshwari </option>
                                    <option value="3" >Mr. R. Gunasekaran </option>
                                    <option value="4" >Mr. B. Sudhakar </option>
                                    
                                 </select>
                                @error('blog_cat') <p class="small text-danger">{{ $message }}</p> @enderror
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
@endsection