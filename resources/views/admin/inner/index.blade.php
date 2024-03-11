@extends('admin.layout.app')
@section('page-title', 'Inner Section')
@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                           
                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
                           
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5px">#</th>
                                   
                                    <th>Title</th>
                                    <th> Description</th>
                                   
                                  
                                  
                                   
                                    <th>Action</th>
                                  
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $index => $item)
                                    <tr>
                                        <td>{{ $index+1}}</td>
                                        
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->desc }}</td>
                                       
                                       
                                       
                                       
                                        <td class="d-flex text-right">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.inner.edit', $item->id) }}" class="btn btn-sm btn-dark" data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-edit"></i>
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
