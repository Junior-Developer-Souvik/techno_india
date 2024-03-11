@extends('admin.layout.app')
@section('page-title', 'Create New Academics')

@section('section')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row mb-3">
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('admin.academics') }}" class="btn btn-sm btn-primary"> <i
                                            class="fa fa-chevron-left"></i> Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.academics.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title *</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Enter title" value="{{ old('title') }}">
                                    @error('title')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="desc"> Description *</label>
                                    <textarea type="text" class="form-control" name="desc" id="desc" rows="4" cols="5"
                                        placeholder="write Short description">{{ old('desc') }}</textarea>
                                    @error('desc')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="sub_title"> Sub Title *</label>
                                    <input type="text" class="form-control" name="sub_title" id="sub_title" rows="4" cols="5"
                                        placeholder="write Short description"  value="{{ old('sub_title') }}">
                                    @error('desc')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="page_title">Page Title *</label>
                                        <input type="text" class="form-control" name="page_title" id="page_title"
                                            value="{{ old('page_title') }}" placeholder="Enter page_title">
                                        @error('page_title')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="meta_title">Meta Title *</label>
                                        <input type="text" class="form-control" name="meta_title" id="meta_title"
                                            value="{{ old('meta_title') }}" placeholder="Enter meta_title">
                                        @error('meta_title')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                </div>

                                <div class="form-group">
                                    <label for="meta_desc"> Meta Description *</label>
                                    <textarea type="text" class="form-control" name="meta_desc" id="meta_desc" value="{{ old('meta_desc') }}"
                                        placeholder="Enter Meta Description"></textarea>
                                    @error('meta_desc')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="meta_keyword">Meta Keyword *</label>
                                    <input type="text" class="form-control" name="meta_keyword" id="meta_keyword"
                                        value="{{ old('meta_keyword') }}" placeholder="Enter meta_keyword">
                                    @error('meta_keyword')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
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











