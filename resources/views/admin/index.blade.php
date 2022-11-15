@extends('admin.components.main')
@section('content')
    <div class="container d-flex justify-content-between mt-2">
      

        <div class="col-xl-6 col-6" style="margin-left: -20px;">
            <div class="card overflow-auto" style="max-height: 300px"">
                <div class="card-header align-items-center d-flex">
                    <i class="material-icons text-warning p-1">
                        warning
                    </i>
                    <h4 class="card-title mb-0 flex-grow-1 py-1">Deadline in 7 DAYS</h4>
                  
                </div><!-- end card header -->
               
                <div class="card-body">
                 
                    <div class="table-responsive table-card">
                        <table class="table table-borderless table-nowrap table-centered align-middle mb-0">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th scope="col">Job's Title</th>
                                    <th scope="col">Dedline</th>
                                    <th scope="col">Applied Employee</th>
                                </tr>
                            </thead><!-- end thead -->
                            <tbody>
                                @foreach($jobs as $j)
                                <tr>
                                  
                                    <td>
                                        <div class="form-check">
                                          
                                            <label class="form-check-label ms-1" for="checkTask1">
                                               {{$j->title}}
                                            </label>
                                        </div>
                                    </td>
                                    <td > {{$j->end_date}}</td>
                                    <td>{{count($j->employees)}}</td>
                                   
                                </tr><!-- end -->
                                @endforeach
                               <!-- end -->
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div>
                   
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div>
      
        <div class="col-xl-6 col-6" style="margin-left: 10px;">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                  
                        <div class="avatar-xs me-3">
                            <span
                                class="avatar-title bg-soft-danger text-danger rounded-circle fs-16">
                                <i class='bx bx-bell'></i>
                            </span>
                        </div>
                    <h4 class="card-title mb-0 flex-grow-1">Unread Notifications</h4>
                </div><!-- end card header -->

                <div class="card-body p-0">

                    
                    
                    <div data-simplebar="init overflow-auto" style="max-height: 210px"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
                        <ul class="list-group list-group-flush border-dashed px-3">
                            @foreach($recent_notifications as $noti)

                            <li class="list-group-item ps-0">
                                <div class="d-flex align-items-start justify-content-between">
                                         
                                    <h6 class="px-1">
                                        @php
                                       for($i=1;$i<=count($recent_notifications);$i++)
                                       {
                                        echo $i.'.';
                                       }
                                    @endphp</h6>
                                    <div class="flex-grow-1 ms-1">
                                        <a href="{{ route('admin.noti.read', $noti->id) }}"" >
                                            <h6 class="mt-0 mb-1 fs-12"><b>{{$noti->employee->name}}</b> applied to <b>{{$noti->jobs->title}}</b></h6>
                                        </a>
                                      
                                    </div>
                                  
                                    <div class="flex-shrink-0 ms-2">
                                        <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                            <span>{{$noti->created_at->diffForHumans()}}</span>
                                        </p>
                                    </div>
                                    
                                </div>
                            </li>
                           @endforeach
                        </ul><!-- end ul -->
                    </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 286px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 167px; transform: translate3d(0px, 36px, 0px); display: block;"></div></div></div>
                  
                </div><!-- end card body -->
            </div><!-- end card -->
 
                </div>
    </div>
    <div class="row">
    <div class="col-xl-10 col-12  mx-auto mt-3" >
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <i class="material-icons p-1 text-danger">
                    favorite
                </i>
                <h4 class="card-title mb-0 flex-grow-1 text-dark">Employee Recently Joined </h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="table-responsive table-card">
                    <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                        <thead class="table-light">
                            <tr class="text-muted">
                                <th scope="col">Name</th>
                                <th scope="col" style="width: 20%;">Email</th>
                                <th scope="col" style="width: 16%;">Account Status</th>
                                <th scope="col">Interested Categories</th>
                                <th scope="col" style="width: 12%;">Joined Date</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($employee as $e)
                            <tr>
                                <td>{{$e->name}}</td>
                                <td>{{$e->email}}</td>
                                <td>
                                    @if($e->is_verify)
                                    <span class="badge badge-soft-success p-2"style="font-size:0.85em">Verified</span>
                                    @else
                                    <span class="badge badge-soft-danger p-2"style="font-size:0.85em">Not Verified</span>
                                    @endif
                                </td>
                              
                                <td>
                                    @if(count($e->categories)>0)
                                        @foreach($e->categories as $c)
                                        <span class="badge badge-soft-primary" style="font-size:0.85em">{{$c->name}}</span>
                                        @endforeach
                                   @else
                                   <span class="text-danger small" style="font-weight: bold;">Not Selected</span>
                                    @endif
                                </td>

         <td>{{$e->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody><!-- end tbody -->
                    </table><!-- end table -->
                </div><!-- end table responsive -->
            </div><!-- end card body -->
        </div><!-- end card -->
    </div>
    </div>
            
        
@endsection