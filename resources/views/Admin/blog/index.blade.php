@extends('admin.layouts.app')

@section('content')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Blog</div>
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
                    <a  href="{{route('admin.blog.create')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0"  >
                        <i class="bx bxs-plus-square"></i>Add New Article</a>
                </div>
            </div>
            <div class="table-responsive">

                <table class="table mb-0">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">date</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blogs as $blog)
                        <tr>
                            <th scope="row">{{$blog->id}}</th>
                            <td><img class='img-thumbnail' width="100" height="100" src="{{asset($blog->image)}}"></td>
                            <td>{{$blog->title}}</td>
                            <td>{{$blog->date}}</td>
                            <td>
                                <div class="d-flex order-actions">
                                    <a href="{{route('admin.blog.edit', $blog->id)}}" class="edit-btn"><i class='bx bxs-edit'></i></a>
                                    <a href="#" style="margin-left: 13px;"><i class="fadeIn animated bx bx-show-alt"></i></a>

                                    <form action="{{route('admin.blog.destroy' , $blog->id)}}" method="post">
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

            <div class="d-lg-flex align-items-center mt-4 gap-3">
                <div class="ms-auto">
                    {{ $blogs->links() }}
                </div>
            </div>

        </div>
    </div>

@endsection

@section('css-custom')

@endsection

@section('js-custom')

@endsection
