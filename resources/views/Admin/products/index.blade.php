@extends('admin.layouts.app')

@section('content')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Products</div>
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
                    <a  href="{{route('admin.products.create')}}" class="btn btn-primary radius-30 mt-2 mt-lg-0"  >
                        <i class="bx bxs-plus-square"></i>Add New Product</a>
                </div>
            </div>
            <div class="table-responsive">

                <table class="table mb-0">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Short Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td><img class='img-thumbnail' width="100" height="100" src="{{asset($product->main_image)}}"></td>
                            <td>{{$product->name}}</td>
                            <td><span class="text-danger">$</span>{{$product->price}}</td>
                            <td>{{$product->short_description}}</td>
                            <td>
                                <div class="d-flex order-actions">
                                    <a href="{{route('admin.products.edit', $product->id)}}" class="edit-btn"><i class='bx bxs-edit'></i></a>
                                    <a href="#" style="margin-left: 13px;"><i class="fadeIn animated bx bx-show-alt"></i></a>

                                    <form action="{{route('admin.products.destroy' , $product->id)}}" method="post">
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
                    {{ $products->links() }}
                </div>
            </div>

        </div>
    </div>

@endsection

@section('css-custom')

@endsection

@section('js-custom')

@endsection
