@extends('admin.layout.app')
@section('page-title', 'Create Extra Curricular')

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.extra-curricular') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.extra-curricular.store') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class=" form-group">
                               
                                    <label for="title">Title </label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Enter title.." value="{{ old('title') }}" class="form-control">
                                    @error('title') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                
                                <div class="form-group">

                                
                                    <label for="desc">Description *</label>
                                    <textarea type="text"  class="form-control" name="desc" id="desc" value="{{ old('desc') }}" class="form-control"></textarea>
                                    <p class="small text-muted">Size: less than 1 mb | Extension: .webp for better SEO | Preferable Dimensions: 120 X 61 px</p>
                                    @error('desc') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title">Page Title *</label>
                                    <input type="text" class="form-control" name="page_title" id="page_title" value="{{ old('page_title') }}"  placeholder="Enter page_title">
                                    @error('page_title') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title">Meta Title *</label>
                                    <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ old('meta_title') }}"  placeholder="Enter meta_title">
                                    @error('meta_title') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="title"> Meta Description *</label>
                                    <textarea type="text" class="form-control" name="meta_desc" id="meta_desc" value="{{ old('meta_desc') }}"  placeholder="Enter Meta Description"></textarea>
                                    @error('meta_desc') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="title">Meta Keyword *</label>
                                    <input type="text" class="form-control" name="meta_keyword" id="meta_keyword" value="{{ old('meta_keyword') }}"  placeholder="Enter meta_keyword">
                                    @error('meta_keyword') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="pl-3 form-group">

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
