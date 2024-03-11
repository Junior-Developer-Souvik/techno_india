@extends('admin.layout.app')
@section('page-title', 'Teaching Process')

@section('section')
    <style>
        .user-images {
            display: flex;
            flex-wrap: wrap;
            list-style-type: none;
            padding: 20px 0;
            margin: 0 -4px;
        }

        .user-images li {
            display: flex;
            align-items: center;
            justify-content: center;
            width: calc((100% - 40px) / 5);
            height: 140px;
            overflow: hidden;
            border-radius: 6px;
            margin: 0 4px 8px;
        }

        .user-images li img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @media only screen and (max-width: 1599px) {
            .user-images li {
                height: 120px;
            }
        }

        @media only screen and (max-width: 1399px) {
            .user-images li {
                height: 100px;
            }
        }

        @media only screen and (max-width: 1299px) {
            .user-images li {
                height: 80px;
            }
        }

        @media only screen and (max-width: 1199px) {
            .user-images li {
                height: 100px;
            }
        }

        @media only screen and (max-width: 991px) {
            .user-images li {
                height: 140px;
            }
        }

        @media only screen and (max-width: 799px) {
            .user-images li {
                height: 120px;
            }
        }

        @media only screen and (max-width: 699px) {
            .user-images li {
                height: 100px;
            }
        }

        @media only screen and (max-width: 575px) {
            .user-images li {
                height: 80px;
            }
        }

        @media only screen and (max-width: 499px) {
            .user-images li {
                width: calc((100% - 32px) / 4);
            }
        }

        @media only screen and (max-width: 399px) {
            .user-images li {
                width: calc((100% - 24px) / 3);
            }
        }

        @media only screen and (max-width: 359px) {
            .user-images li {
                height: 70px;
            }
        }
    </style>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row mb-3">
                                <div class="col-md-12 text-right">
                                    <button data-toggle="modal" data-target="#exampleModalCenter"
                                        class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Create</button>

                                    <a href="{{ route('admin.academics') }}" class="btn btn-sm btn-primary"> <i
                                            class="fa fa-chevron-left"></i> Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5px">#</th>

                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Logo</th>
                                        <th>Status</th>
                                        <th>Action</th>





                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->desc }}</td>
                                            {{-- {{dd($item->logo)}} --}}
                                            <td><img src="{{ asset('sub_academics_uploads') }}/{{ $item->logo }}"
                                                    alt="no-image" width="85px" class="img-thumbnail"></td>
                                            <td>
                                                <div class="custom-control custom-switch mt-1" data-toggle="tooltip"
                                                    title="Toggle status">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch{{ $item->id }}"
                                                        {{ $item->status == 1 ? 'checked' : '' }}
                                                        onchange="statusToggle('{{ route('admin.subacademics.status', $item->id) }}')">
                                                    <label class="custom-control-label"
                                                        for="customSwitch{{ $item->id }}"></label>
                                                </div>
                                            </td>
                                            <td class="d-flex text-right">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.subacademics.edit', $item->id) }}"
                                                        class="btn btn-sm btn-dark" data-toggle="modal"
                                                        data-target="#exampleModalCenterEdit"
                                                        onclick="getAcademics({{ $item->id }})">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger delete-btn"
                                                        data-toggle="tooltip" title="Delete" data-id="{{ $item->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            {{-- Edit Modal --}}
                                            <div class="modal fade" id="exampleModalCenterEdit" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Add Teaching
                                                                Process</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('admin.subacademics.update') }}"
                                                                method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <input type="hidden" name="id" id="id">
                                                                    <input type="hidden" name="academics_id"
                                                                        id="academics_id">

                                                                    <input type="hidden" name="old_img_path"
                                                                        id="old_img_path">

                                                                    <label for=""><strong>Title</strong></label>
                                                                    <input type="text" name="SubAcademics_title"
                                                                        id="SubAcademics_title" class="form-control">
                                                                    @error('SubAcademics_title')
                                                                    <p class="small text-danger">{{ $message }}</p>
                                                                    @enderror

                                                                </div>

                                                                <div class="form-group">
                                                                    <label
                                                                        for=""><strong>Description</strong></label>
                                                                    <textarea type="text" name="SubAcademics_desc" id="SubAcademics_desc" class="form-control"></textarea>
                                                                    @error('SubAcademics_desc')
                                                                        <p class="small text-danger">{{ $message }}</p>
                                                                    @enderror

                                                                </div>

                                                                <div class="form-group">
                                                                    <label for=""><strong>Logo</strong></label>
                                                                    <input type="file" name="Image_logo" id="Image_logo"
                                                                        class="form-control" onchange="updateImg(event)">
                                                                    <span id="imgUpdatePreview"></span>
                                                                    <span id="img"></span>
                                                                    @error('Image_logo')
                                                                        <p class="small text-danger">{{ $message }}</p>
                                                                    @enderror

                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button class="btn btn-primary">Save changes</button>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Teaching Process</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.subacademics.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="id" value ="{{ $id }}">
                            <label for=""><strong>Title</strong></label>
                            <input type="text" name="title" id="title" placeholder="Enter Title"
                                class="form-control" value="{{ old('title') }}">
                            @error('title')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for=""><strong>Description</strong></label>
                            <textarea type="text" name="desc" id="desc" placeholder="Enter Description" class="form-control">{{ old('desc') }}</textarea>
                            @error('desc')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="form-group">
                            

                            <label for=""><strong>Logo</strong></label>
                            <input type="file" name="logo" id="logo" class="form-control"
                                onchange="uploadImg(event)">
                            <div id="img-preview"></div>
                            @error('logo')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

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
                        window.location.href = '../../subacademics/delete/' +
                            itemId; // Replace '/delete/' with your actual delete route
                    }
                });
            });
        });

        function getAcademics(academicsId) {
            // console.log(academicsId);
            $.ajax({
                'type': 'GET',
                'url': "http://127.0.0.1:8000/admin/content-management/subacademics/edit/" + academicsId,
                'data': {},
                'success': function(response, status) {
                    console.log(response);
                    console.log(status);

                    
                    var imglogo = response.logo;
                    document.getElementById('imgUpdatePreview').innerHTML =
                        `<img src='{{ asset('sub_academics_uploads') }}/${imglogo}' alt='no-image' width='65px' class='img-thumbnail' />`;
                    $('#SubAcademics_title').val(response.title);
                    $('#SubAcademics_desc').val(response.desc);
                    $('#id').val(response.id);
                    $('#old_img_path').val(response.logo);
                    $('#academics_id').val(response.content_academics_id);

                },
                'error': function(error) {
                    console.log('error');
                }
            });

        }

        function updateImg(event) {
            // console.log(event);
            let file = event.target.files[0];
            if (file.type == 'image/jpg' || file.type == 'image/jpeg' || file.type == 'image/avif' || file.type ==
                'image/webp' || file.type == 'image/png') {
                let imgBinary = URL.createObjectURL(file);
                // console.log(imgBinary);
                document.getElementById('imgUpdatePreview').innerHTML = "";
                document.getElementById('img').innerHTML =
                    `<img src='${imgBinary}' alt='no-image' width='65px' class='img-thumbnail'/>`;
            }
        }
    </script>
@endsection
