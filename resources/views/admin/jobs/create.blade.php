@extends('admin.components.main')
@section('jobs')
    active
@endsection
@section('content')
<style>
    #container {
        width: 1000px;
        margin: 20px auto;
    }
    .ck-editor__editable[role="textbox"] {
        /* editing area */
        min-height: 200px;
    }
    .ck-content .image {
        /* block images */
        max-width: 80%;
        margin: 20px auto;
    }
</style>
    <div class="container">
       <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.jobs.store') }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.jobs.index') }}">
                                <i class="ri-arrow-left-s-line"></i> Back
                            </a>
                            <h3>New Jobs</h3>
                            <div></div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Job's Title *</label>
                            <input type="text" name="title"  class="form-control">
                        </div>
                        @if ($errors->has('title'))

                        {{-- {{ var_dump(old('title')) }} --}}
                            <p class="mb-3 text-danger">{{ $errors->first('title') }}</p>
                        @endif
                        <div class="mb-3">
                            <label for="" class="form-label">Select Category *</label>
                            <select name="categories_id" id="" class="form-control">
                                <option selected disabled>-- Select Categories --</option>
                                @foreach ($categories as $cat)
                                    <option {{ old('categories_id') == $cat->id ? 'selected' :'' }} value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('categories_id'))
                            <p class="mb-3 text-danger">{{ $errors->first('categories_id') }}</p>
                        @endif
                        <div class="mb-3">
                            <label for="" class="form-label">Salary</label>
                            <input type="text" name="salary" value="{{ old('salary')}}" id="" class="form-control">
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
                                    <textarea name="jd" id="" class="form-control" cols="30" rows="10">{{ old('jd') }}</textarea>
                                </div>
                                <div class="tab-pane" id="jr" role="tabpanel">
                                    <textarea name="jr" id="" class="form-control" cols="30" rows="10">{{ old('jr') }}</textarea>
                                </div>
                                <div class="tab-pane" id="desc" role="tabpanel">
                                   <textarea name="desc" id="" class="form-control" cols="30" rows="10">{{ old('desc') }}</textarea>
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
                            <input type="date" name="end_date" value="{{ old('end_date') }}" class="form-control" id="">
                        </div>
                        
                        @if ($errors->has('end_date'))
                            <p class="mb-3 text-danger">{{ $errors->first('end_date') }}</p>
                        @endif
                        <div class="mb-3 form-check form-switch">
                            <input type="checkbox" name="is_display" checked class="form-check-input" id="id">
                            <label for="id" class="form-check-label">
                                Is Display
                            </label>
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary py-1 px-5">Create</button>
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