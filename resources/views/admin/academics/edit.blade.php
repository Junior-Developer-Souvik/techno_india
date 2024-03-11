@extends('admin.layout.app')
@section('page-title', 'Edit Academics Details')

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.academics') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.academics.update') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title *</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $data->title }}">
                                @error('title') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                          <div class="form-group">
                                <label for="desc"> Description *</label>
                                <textarea type="text" class="form-control" name="desc" id="desc" >{{ $data->desc }}</textarea>
                                @error('desc') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                          <div class="form-group">
                                <label for="sub_title">Sub Title *</label>
                                <textarea type="text" class="form-control" name="sub_title" id="sub_title" >{{ $data->sub_title }}</textarea>
                                @error('sub_title') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                           
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="page_title">Page Title *</label>
                                    <input type="text" class="form-control" name="page_title" id="page_title"  value="{{ $data->page_title }}">
                                    @error('page_title') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="meta_title">Meta Title *</label>
                                    <input type="text" class="form-control" name="meta_title" id="meta_title"  value="{{ $data->meta_title }}">
                                    @error('meta_title') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="meta_desc">Meta Description *</label>
                            <textarea type="text" class="form-control" name="meta_desc" id="meta_desc">{{ $data->meta_title }}</textarea>
                            @error('meta_title') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>

                        <div class="form-group">
                            <label for="meta_keyword">Meta Keyword *</label>
                            <input type="text" class="form-control" name="meta_keyword" id="meta_keyword"  value="{{ $data->meta_keyword }}">
                            @error('meta_keyword') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>

                        

                       
                          
                          
                        

                            <input type="hidden" name="id" value="{{$data->id}}">
                          
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