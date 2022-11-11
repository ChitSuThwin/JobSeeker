@extends('admin.components.main')
@section('jobs')
    active
@endsection
@section('content')
    <div class="container">
       <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.jobs.update', $job->id) }}" method="POST">
                        @csrf {{ method_field('put') }}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.jobs.index') }}">
                                <i class="ri-arrow-left-s-line"></i> Back
                            </a>
                            <h3>Edit Job</h3>
                            <div></div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Job's Title *</label>
                            <input type="text" name="title" value="{{ $job->title }}" class="form-control">
                        </div>
                        @if ($errors->has('title'))
                            <p class="mb-3 text-danger">{{ $errors->first('title') }}</p>
                        @endif
                        <div class="mb-3">
                            <label for="" class="form-label">Select Category *</label>
                            <select name="categories_id" id="" class="form-control">
                                <option selected disabled>-- Select Categories --</option>
                                @foreach ($categories as $cat)
                                    <option {{ $job->categories_id == $cat->id ? 'selected' :'' }} value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('categories_id'))
                            <p class="mb-3 text-danger">{{ $errors->first('categories_id') }}</p>
                        @endif
                        <div class="mb-3">
                            <label for="" class="form-label">Salary</label>
                            <input type="text" name="salary" value="{{ $job->salary }}" id="" class="form-control">
                        </div>

                        @if ($errors->has('salary'))
                            <p class="mb-3 text-danger">{{ $errors->first('salary') }}</p>
                        @endif
                        <div class="mb-3">
                            <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#jd" role="tab" aria-selected="false">
                                        JD
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#jr" role="tab" aria-selected="true">
                                        JR
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#desc" role="tab" aria-selected="false">
                                        Description  
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content text-muted">
                                <div class="tab-pane active" id="jd" role="tabpanel">
                                    <div id="editor"></div>
                                    <textarea name="jd" id="" class="form-control" cols="30" rows="10">{{ $job->job_description }}</textarea>
                                </div>
                                <div class="tab-pane" id="jr" role="tabpanel">
                                    <textarea name="jr" id="" class="form-control" cols="30" rows="10">{{ $job->job_requirement }}</textarea>
                                </div>
                                <div class="tab-pane" id="desc" role="tabpanel">
                                   <textarea name="desc" id="" class="form-control" cols="30" rows="10">{{ $job->description }}</textarea>
                                </div>
                            </div>

                        @if ($errors->has('jd') || $errors->has('jr') || $errors->has('desc') )
                            <p class="mb-3 text-danger">{{ $errors->first('jd') }}</p>
                            <p class="mb-3 text-danger">{{ $errors->first('jr') }}</p>
                            <p class="mb-3 text-danger">{{ $errors->first('desc') }}</p>
                        @endif
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Close Date</label>
                            <input type="date" name="end_date" value="{{ $job->end_date }}" class="form-control" id="">
                        </div>
                        
                        @if ($errors->has('end_date'))
                            <p class="mb-3 text-danger">{{ $errors->first('end_date') }}</p>
                        @endif
                        <div class="mb-3 form-check form-switch">
                            <input type="checkbox" name="is_display" {{ $job->is_display == '1' ? 'checked' : '' }} class="form-check-input" id="id">
                            <label for="id" class="form-check-label">
                                Is Display
                            </label>
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-danger py-1 px-5">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       </div>
    </div>    
@endsection
@section('js')

@endsection