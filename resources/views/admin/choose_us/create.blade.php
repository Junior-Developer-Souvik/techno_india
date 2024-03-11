@extends('admin.layout.app')
@section('page-title', 'Create Choose Us')

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
                        <form action="{{ route('admin.choose_us.store') }}" method="post" enctype="multipart/form-data">
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
                                <label for="title">Logo *</label>
                                <input type="file" class="form-control" name="logo" id="logo" onchange="uploadImg(event)">
                                <div id="img-preview"></div>
                                @error('logo') <p class="small text-danger">{{ $message }}</p> @enderror
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