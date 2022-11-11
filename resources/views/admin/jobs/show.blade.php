@extends('admin.components.main')
@section('jobs')
    active
@endsection
@section('content')
<div class="card m-3">
    <div class="card-header align-items-xl-center d-xl-flex">
        
        <div class="flex-shrink-0">
            <ul class="nav nav-pills card-header-pills" role="tablist">
                 <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#jd" role="tab" aria-selected="false">
                Job's Details
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#ea" role="tab" aria-selected="true">
                Employee Applied
            </a>
        </li>
      
            </ul>
        </div>
    </div>


    <div class="tab-content text-muted m-3">
        <div class="tab-pane active" id="jd" role="tabpanel">
            <div class="d-flex w-100 justify-content-between align-items-center">
                <a href="{{ route('admin.jobs.index') }}" >
                    <i class="ri-arrow-left-s-line"></i>
                </a>
               
              
                <h3 class="text-center mt-2 pl-5">{{ $job->title }}</h3>

                <div class="d-flex">
                   <a class="btn btn-sm text-danger" href="{{route('admin.jobs.edit',$job->id)}}" style="font-size: 1.2em;">
            <i class="ri-edit-line"></i>
            </a>
            
            <a class="btn btn-sm text-dark" href="" style="font-size: 1.2em;">
            <i class="ri-delete-bin-fill"></i>
            </a>
            
            </div>
            </div>
         
     
<div class="d-flex justify-content-center">
    <div class="d-flex align-items-center gap-1 m-3">
              
        <span class="d-flex align-items-cente badge badge-soft-primary badge-border gap-1" style="font-size:1em;">
        
            <i class="ri-layout-masonry-fill"></i>
            {{ $job->categories->name }}
        </span>
    
    </div>
<div class="d-flex align-items-center badge badge-soft-success badge-border gap-1 m-3" style="font-size:1em;">
<i class="mdi mdi-credit-card-multiple-outline"></i>
{{-- <i class="ri-coins-line"></i> --}}
{{ $job->salary}}
</div>

<div class="d-flex align-items-center badge badge-soft-warning badge-border gap-1 m-3" style="font-size:1em;">
<i class="ri-timer-line"></i>
Deadline : {{ $job->end_date}}
</div>

</div>
<div class="d-flex flex-column ml-3 text-justify">
<div class="mt-4">
    <h6>Job's Description</h6>
    <p class="text-justify m-2">{{ $job->job_description }}</p>
</div>
<div class="mt-2">
    <h6>Job's Requirement</h6>
    <p class="text-justify m-2">{{ $job->job_requirement}}</p>
</div>
<div class="mt-2">
    <h6 >Description</h6>
    <p class="text-justify m-2">{{ $job->description }}</p>
</div>

</div>
</div>

            {{-- <div id="editor"></div>
            <div class="d-flex w-100 justify-content-between align-items-center">
                <a href="{{ route('admin.jobs.index') }}">
                    <i class="ri-arrow-left-s-line"></i> Back
                </a>
                <h3 class="text-center card-title">{{ $job->title }}</h3>
                <span class="text-muted">{{ $job->created_at->diffforHumans() }}</span>
            </div> --}}
            {{-- <div class="d-flex justify-content-center text-muted mt-2">
                <div>
                    <a class="btn btn-sm btn-outline-danger" href="{{ route('admin.jobs.edit', $job->id) }}">
                        <i class="ri-edit-line"></i>
                    </a>
                    <a class="btn btn-sm btn-outline-dark" href="">
                        <i class="ri-delete-bin-fill"></i>
                    </a>
                </div>
            </div> --}}
            {{-- <div class="d-flex justify-content-center align-items-center gap-4 mb-2 mt-3">
                <span class="d-flex align-items-cente text-primary gap-1">
                    <i class="ri-layout-masonry-fill"></i>{{ $job->categories->name }}
                </span>
                <span class="d-flex align-items-cente text-primary gap-1">
                    <i class="ri-money-dollar-circle-fill"></i> {{ $job->salary }}
                </span>
                <span>End Date : {{ $job->end_date }}</span>
            </div>

            <div>
                <h5>Job's Description</h5>
                <p>{{ $job->job_description }}</p>
            </div>
            <div>
                <h5>Job's Requirement</h5>
                <p>{{ $job->job_requirement }}</p>
            </div>
            <div>
                <h5>Description</h5>
                <p>{{ $job->description }}</p>
            </div> --}}
      
        <div class="tab-pane table-responsive table-card  m-2" id="ea" role="tabpanel">
        <!-- Hoverable Rows -->
<table class="table table-nowarp">
    <thead class="table-danger">
     
        <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Resume</th>
            <th scope="col">Action</th>
        </tr>
       
    </thead>
    <tbody>
        @foreach ($employee->employees as $employee)
        <tr>
            <td></td>
            <td>{{$employee->name}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->phone}}</td>
            <td >
                <a class="d-flex gap-1 text-dark" target="_blank" href="{{asset('/resume/'.$employee->resume)}}">
                    <i class="ri-eye-2-line"></i> View
                </a>
            </td>
            <td><a href=""><button class="btn btn-sm btn-success">Details</button></i></a></td>
        </tr>
        @endforeach
        
        {{-- <tr>
          
            <td>#744145235</td>
            <td>Shoppers</td>
            <td>Juston Eichmann</td>
            <td>$7,546</td>
            <td><a href="javascript:void(0);"><i class="ri-download-2-line"></i></a></td>
        </tr>
        <tr>
           
            <td>#9855126598</td>
            <td>Flipkart</td>
            <td>Bettie Johson</td>
            <td>$1,350</td>
            <td><a href="javascript:void(0);"><i class="ri-download-2-line"></i></a></td>
        </tr>
        <tr>
            
            <td>#847512653</td>
            <td>Shoppers</td>
            <td>Maritza Blanda</td>
            <td>$4,521</td>
            <td><a href="javascript:void(0);"><i class="ri-download-2-line"></i></a></td>
        </tr> --}}
    </tbody>
</table>
        </div>
        
    </div>
</div>
    {{-- <div class="container">
       <div class="row">
        
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex w-100 justify-content-between align-items-center">
                        <a href="{{ route('admin.jobs.index') }}">
                            <i class="ri-arrow-left-s-line"></i> Back
                        </a>
                        <h3 class="text-center card-title">{{ $job->title }}</h3>
                        <span class="text-muted">{{ $job->created_at->diffforHumans() }}</span>
                    </div>
                    {{-- <div class="d-flex justify-content-center text-muted mt-2">
                        <div>
                            <a class="btn btn-sm btn-outline-danger" href="{{ route('admin.jobs.edit', $job->id) }}">
                                <i class="ri-edit-line"></i>
                            </a>
                            <a class="btn btn-sm btn-outline-dark" href="">
                                <i class="ri-delete-bin-fill"></i>
                            </a>
                        </div>
                    </div> --}}
                    {{-- <div class="d-flex justify-content-center align-items-center gap-4 mb-2 mt-3">
                        <span class="d-flex align-items-cente text-primary gap-1">
                            <i class="ri-layout-masonry-fill"></i>{{ $job->categories->name }}
                        </span>
                        <span class="d-flex align-items-cente text-primary gap-1">
                            <i class="ri-money-dollar-circle-fill"></i> {{ $job->salary }}
                        </span>
                        <span>End Date : {{ $job->end_date }}</span>
                    </div>

                    <div>
                        <h5>Job's Description</h5>
                        <p>{{ $job->job_description }}</p>
                    </div>
                    <div>
                        <h5>Job's Requirement</h5>
                        <p>{{ $job->job_requirement }}</p>
                    </div>
                    <div> --}}
                        {{-- <h5>Description</h5>
                        <p>{{ $job->description }}</p>
                    </div>
                    
                </div>
            </div>
        </div>
       </div> --}}
    {{-- </div>     --}}
</div>


@endsection
@section('js')

@endsection