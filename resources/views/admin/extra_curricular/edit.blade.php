@extends('admin.layout.app')
@section('page-title', 'Edit Extra Curricular ')

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
                        <form action="{{ route('admin.extra-curricular.update') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title *</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $data->title }}">
                                @error('title') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="desc">Description *</label>
                                <input type="text" class="form-control" name="desc" id="desc" value="{{ $data->desc }}">
                                @error('desc') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">Page Title *</label>
                                <input type="text" class="form-control" name="page_title" id="page_title" value="{{$data->page_title }}"  placeholder="Enter page_title">
                                @error('page_title') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">Meta Title *</label>
                                <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ $data->meta_title }}"  placeholder="Enter meta_title">
                                @error('meta_title') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="title"> Meta Description *</label>
                                <textarea type="text" class="form-control" name="meta_desc" id="meta_desc"   placeholder="Enter Meta Description">{{ $data->meta_desc}}</textarea>
                                @error('meta_desc') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="title">Meta Keyword *</label>
                                <input type="text" class="form-control" name="meta_keyword" id="meta_keyword" value="{{ $data->meta_keyword }}"  placeholder="Enter meta_keyword">
                                @error('meta_keyword') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="pl-3 form-group">

                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                           
                      

                          

                       

                            <input type="hidden" name="id" value="{{$data->id}}">
                            
                           
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