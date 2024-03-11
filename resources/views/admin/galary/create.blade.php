@extends('admin.layout.app')
@section('page-title', 'Create Galary')

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
                        <form action="{{ route('admin.galary.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                           

                           

                           

                            <div class="form-group">
                                <label for="title">Image *</label>
                                <input type="file" class="form-control" name="image" id="image" onchange="uploadImg(event)">
                                <div id="img-preview"></div>
                                @error('image') <p class="small text-danger">{{ $message }}</p> @enderror
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