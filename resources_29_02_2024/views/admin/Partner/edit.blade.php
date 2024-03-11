@extends('admin.layout.app')
@section('page-title', 'Update Client')

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.partner.list.all') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.partner.update') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="row form-group">
                                <div class="col-md-6" style="margin-top: 50px;">
                                    <label for="name">Company Name *</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter company name" value="{{ old('name') ? old('name') : $data->name }}">
                                    @error('name') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                                <div class="col-md-6">
                                    @if (!empty($data->image))
                                        @if (!empty($data->image) && file_exists(public_path($data->image)))
                                            <img src="{{ asset($data->image) }}" alt="partner img" class="img-thumbnail mr-3" style="height: 50px">
                                        @else
                                            <img src="{{ asset('backend-assets/images/placeholder.jpg') }}" alt="partner image" style="height: 50px" class="mr-2">
                                        @endif
                                        <br>
                                    @endif
                                    <label for="image">Company logo *</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    <p class="small text-muted">Size: less than 1 mb | Extension: .webp for better SEO | Preferable Dimensions: 64 X 64 px</p>
                                    @error('image') <p class="small text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
