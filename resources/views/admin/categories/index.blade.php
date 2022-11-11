@extends('admin.components.main')
@section('categories')
    active
@endsection
@section('content')
    @include('admin.categories.create')
    @include('admin.categories.edit')
    @include('admin.categories.delete')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Categories</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
    </div>
    <div class="container">
        <div class="d-flex justify-content-end mb-2">
            <button data-bs-toggle="modal" data-bs-target="#create" class="btn btn-primary py-2 px-4">Create New Category</button>
        </div>
        <div class= "row" id="scat"></div>

        <div class="row" id="cat">
            @foreach ($data as $d)
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body d-flex flex-column gap-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="m-0">{{ $d->name }}</h4>
                                <span class="text-muted">{{ $d->created_at }}</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="ri-newspaper-line"></i> {{ count($d->jobs) }} Posts
                            </div>
                            <div class="d-flex gap-1">
                                <button onclick="getEditData({{ $d->id }},'{{ $d->name }}')" data-bs-target="#edit" data-bs-toggle="modal" class="btn btn-sm btn-danger d-flex align-items-center gap-1">
                                    <i class="ri-edit-line"></i>
                                    Edit</button>
                                <button data-bs-toggle="modal" data-bs-target="#delete" onclick="deleteCat({{ $d->id }})" class="btn btn-sm btn-dark d-flex align-items-center gap-1">
                                <i class="ri-delete-bin-line"></i> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>    
@endsection

@section('js')
    <script>
        function getEditData(id,name){
            // $.ajax({
            //     url : `/admin/getData`,
            //     method : 'POST',
            //     data: {
            //         id : id,
            //         _token : `{{ csrf_token() }}`
            //     },
            //     success : function(res){
            //         console.log(res);
            //     }
            // })
            $('#editName').val(name);
            $('#editForm').attr('action',`{{ url('/admin/categories') }}/${id}`);
        
        }
        function deleteCat(id){
            $('#deleteForm').attr('action',`{{ url('/admin/categories') }}/${id}`)
        }
        $.ajaxSetup({
   headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});
        $('#search').keyup(function()
      
        {
            if($(this).val().trim()!="" && $(this).val().length>0)  // need to have at least one word to search and not whitespace
              {
             var value=$(this).val();
             $.ajax(
            {
               
                method:'POST',
                url:"/admin/categories/search",
                data:{'name':value},
                success:function(res)
                {
               

                   console.log(res);
              let  cat=JSON.parse(res);
              
                  
                
                 if(cat.length !=0)
                 {
                 $('#scat').html('');
                    $('#cat').hide();
                    cat.forEach(val => {
             
                        $('#scat').append(`<div class="col-lg-4">
            <div class="card">
            <div class="card-body d-flex flex-column gap-2">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">${val.name}</h4>
                    <span class="text-muted">
                   ${val.updated_At}
                    </span>
                </div>
                <div class="d-flex align-items-center gap-1">
               <i class="las la-file-alt"></i> <span >  {{count($d->jobs)}} posts </span>
               </div>
                <div class="d-flex gap-1 mt-1">
                <button type="button" class="btn btn-danger" data-bs-target="#edit" data-bs-toggle="modal" onclick="getEditData(${val.id},'${val.name}')"><i class="las la-pen"></i>Edit</button>
                <button class="btn btn-dark" data-bs-target="#delete" data-bs-toggle="modal" onclick="deleteData(${val.id})"><i class="las la-trash" ></i>Delete</button>
                </div>
             
            </div>
            </div>`)
        });
                    }
                else
            {
                $('#cat').hide();
                $('#scat').html('');
                $('#scat').append('<div class="col-12 text-danger text-center" style="padding:100px 0;"> --- Not Found --- </div>');
            }   }
                
            });
        }
        else
    {
        $('#scat').html('');
        $('#cat').show();

    }
});

         
        
    </script>
    @if ($errors->has('name'))
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('create'));
        myModal.show();

        // document.querySelector('#createBtn').click();
        
    </script>
    @endif
@endsection