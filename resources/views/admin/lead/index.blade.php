@extends('admin.layout.app')
@section('page-title', 'Lead list')

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{route('admin.exportExcel')}}" class="btn btn-sm btn-success"> <i class="fa fa-file-excel"></i> Export</a>
                            </div>
                        </div>
                     
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>User name</th>
                                    <th>Contact</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            
                     <tbody>
                         @forelse ($data as $index => $item)
                             <tr>
                                 <td>{{ $index + 1}}</td>
                                <td>{{$item->full_name}}</td>
                                <td>
                                    <p class="small text-muted mb-0">{{ $item->mobile_number }}</p>
                                </td>
                                <td>
                                    <p class="small text-muted mb-0">{{ $item->message }}</p>
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
                                   
                                    
                                   
                                    
                                         


                                        
                                      
                                       
                                       
                                        
                                   

                                               