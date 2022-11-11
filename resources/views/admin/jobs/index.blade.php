@extends('admin.components.main')
@section('jobs')
    active
@endsection

@section('content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Jobs</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                        <li class="breadcrumb-item active">Jobs</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
</div>
    <div class="container">
        <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary py-2 px-4">Upload New Jobs</a>
        </div>
        <div class="row">
            @foreach ($jobs as $j)
            <div class="col-lg-6 col-12">
                <div class="card" style="border-radius:10px;">
                <div class="card-body d-flex flex-column gap-2">
                    
                    <div class="d-flex  justify-content-between align-items-center">
                        <h4 class="card-title text-primary">{{$j->title}}</h4>
                       
                      <span class="text-muted"> {{$j->created_at}}</span>
                    </div>
                    <div class="d-flex align-items-center gap-1 mb-1 text-muted">
                        <i class="ri-apps-line"></i>
                        {{$j->categories->name}}
                    </div>
                    <div class="d-flex justify-content-between ">
                    <div class="d-flex align-items-center gap-3">
                        
                        <div class="d-flex align-items-center gap-1">
                            <i class="mdi mdi-credit-card-multiple-outline"></i>
                            {{$j->salary}} 
                        </div>
                  
                        <div class="d-flex align-items-center gap-1">
                            <i class="ri-timer-line"></i>
                            Deadline : {{$j->end_date}}
             
                       
                        
                    </div>
                   </div>
                   <div class="d-flex" >
                   <a href="{{ route('admin.jobs.show', $j->id) }}" class="btn btn-sm text-success" style="font-size: 1.2em;" >
                    <i class="mdi mdi-eye"></i>
                </a>
                <a  href="{{ route('admin.jobs.edit', $j->id) }}" class="btn btn-sm text-danger" style="font-size: 1.2em;">
                    <i class="ri-edit-line"></i>
                </a>
               
                <form action="{{ route('admin.jobs.destroy', $j->id) }}" method="POST">
                    @csrf {{ method_field('delete') }}
                    <button class="btn btn-sm text-dark">
                        <i class="ri-delete-bin-fill" style="font-size: 1.2em;"></i>
                    </button>
                </form>
               
                    </div>
                </div>
                </div>
            </div>
        
    
        </div>
            {{-- <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                            <h4 class="text-center card-title">{{ $job->title }}</h4>
                            <span class="text-muted">{{ $job->created_at->diffforHumans() }}</span>
                        </div>
                        <div class="d-flex align-items-center gap-4 mb-2">
                            <span class="d-flex align-items-cente text-primary gap-1">
                                <i class="ri-layout-masonry-fill"></i>{{ $job->categories->name }}
                            </span>
                            <span class="d-flex align-items-cente text-primary gap-1">
                                <i class="ri-money-dollar-circle-fill"></i> {{ $job->salary }}
                            </span>
                            <span>End Date : {{ $job->end_date }}</span>
                        </div>
                        <div class="d-flex gap-1 text-muted">
                            
                                <a class="btn btn-sm btn-success" href="{{ route('admin.jobs.show', $job->id) }}">
                                    <i class="ri-eye-line"></i>
                                </a>
                                <a class="btn btn-sm btn-danger" href="{{ route('admin.jobs.edit', $job->id) }}">
                                    <i class="ri-edit-line"></i>
                                </a>
                                <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST">
                                    @csrf {{ method_field('delete') }}
                                    <button class="btn btn-sm btn-dark">
                                        <i class="ri-delete-bin-fill"></i>
                                    </button>
                                </form>
                        
                        </div>
                    </div>
                </div>
            </div> --}}
            @endforeach
        </div>
    </div>    
@endsection
@section('js')

@endsection