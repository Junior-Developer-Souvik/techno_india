@extends('admin.layout.app')
@section('page-title', 'Contact Us list')
@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.contact_us.create') }}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Create</a>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <form action="" method="get">
                                    {{-- <div class="d-flex justify-content-end"> --}}
                                        {{-- <div class="form-group ml-2">
                                            <input type="search" class="form-control form-control-sm" name="keyword" id="keyword" value="{{ request()->input('keyword') }}" placeholder="Search something...">
                                        </div>

                                        <div class="form-group ml-2">
                                            <div class="btn-group">
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-filter"></i>
                                                </button>
                                                <a href="{{ url()->current() }}" class="btn btn-sm btn-light" data-toggle="tooltip" title="Clear filter">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                   <th style="width: 5px">#</th>
                                   <th>Mobile Number 1</th>
                                   <th>Mobile Number 2</th>
                                   <th>Email Id</th>
                                   <th>Address</th>
                                   <th>Action</th>
                                </tr>
                            </thead>
                                  
                                  
                            <tbody>
                                @forelse ($data as $index => $item)
                                    <tr>
                                        <td>{{ $index+1}}</td>
                                       <td>{{$item->mobile_number_1}}</td>
                                       <td>{{$item->mobile_number_2}}</td>
                                       <td>{{$item->email}}</td>
                                       <td>{{$item->address}}</td>
                                        
                                       
                                        
                                       
                                        
                                      
                                        <td class="d-flex text-right">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.contact_us.edit', $item->id) }}" class="btn btn-sm btn-dark" data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger delete-btn" data-toggle="tooltip" title="Delete" data-id="{{ $item->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%" class="text-center">No records found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            var itemId = $(this).data('id');
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'contact_us/delete/' + itemId; // Replace '/delete/' with your actual delete route
                }
            });
        });
    });
</script>
@endsection