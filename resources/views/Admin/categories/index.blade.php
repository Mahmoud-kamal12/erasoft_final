@extends('admin.layouts.app')

@section('content')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Categories</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <div class="d-lg-flex align-items-center mb-4 gap-3">
                <div class="position-relative">
                    <input type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                </div>

                <div class="ms-auto">
                    <button  class="btn btn-primary radius-30 mt-2 mt-lg-0" data-bs-toggle="modal" data-bs-target="#addCategoryModel" >
                        <i class="bx bxs-plus-square"></i>Add New Category</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead class="table-light">
                    <tr>

                        <th>Order#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>description</th>
                        <th>Status</th>
                        <th>View Products</th>
                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>

                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="ms-2">
                                        <h6 class="mb-0 font-14">#{{$category->id}}</h6>
                                    </div>
                                </div>
                            </td>
                            <td><img class='img-thumbnail' width="100" height="100" src="{{asset($category->cover)}}"></td>
                            <td>{{$category->name}}</td>
                            <td>{{substr($category->description, 0, 20) }} ...</td>
                            @if($category->enable)
                                <td><div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>Enabled</div></td>
                            @else
                                <td><div class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3"><i class='bx bxs-circle me-1'></i>Disabled</div></td>
                            @endif
                            <td><a type="button" href="{{route('admin.categories.show', $category->id)}}" class="btn btn-primary btn-sm radius-30 px-4">View Products</a></td>
                            <td>
                                <div class="d-flex order-actions">
                                    <a data-url="{{route('admin.categories.edit', $category->id)}}" class="edit-btn"><i class='bx bxs-edit'></i></a>
                                    <form action="{{route('admin.categories.destroy' , $category->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="ms-3"><i class='bx bxs-trash'></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div class="modal fade" id="addCategoryModel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="card-body">

                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Name</h6>
                                </div>
                                <div class="col-sm-10 text-secondary">
                                    <input type="text" name="name" class="form-control" value="title" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Description</h6>
                                </div>
                                <div class="col-sm-10 text-secondary">
                                    <input type="text" name="description" class="form-control" value="Description" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Enable Category</h6>
                                </div>
                                <div class="col-sm-10 text-secondary">
                                    <select name="enable" class="single-select">
                                        <option value="1" selected>Enable</option>
                                        <option value="0">Disable</option>
                                    </select>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Cover</h6>
                                </div>
                                <div class="col-sm-10 text-secondary">
                                    <input class="form-control" type="file" id="formFile" name="cover">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Slider Cover</h6>
                                </div>
                                <div class="col-sm-10 text-secondary">
                                    <input class="form-control" type="file" id="formFile" name="slider_image">
                                </div>
                            </div>


                            <div class="row text-center">
                                <div class="col-sm-12 text-center text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                </div>
                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('css-custom')

@endsection

@section('js-custom')

    <script>

        $(document).on('click' , ".edit-btn" , function (){
            var url = $(this).data('url');
            $.ajax({
                method: "GET",
                url: url,
                success: function (response) {
                    if (response.html){
                        let html = response.html
                        $('#addCategoryModel .modal-body').html(html)
                        $('#addCategoryModel').modal('show')
                    }
                },
                error:function (xhr,ststus,error) {
                    console.log(xhr , status , error)
                }
            });
        })

    </script>

@endsection
