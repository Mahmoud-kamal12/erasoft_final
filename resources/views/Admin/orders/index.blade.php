@extends('admin.layouts.app')

@section('content')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Orders</div>
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
            <form action="{{route('admin.orders.index')}}" method="GET">

            <div class="d-lg-flex align-items-center mb-4 gap-3">
                    <div class="position-relative">
                        <input name="q" type="text" class="form-control ps-5 radius-30" placeholder="Search Order"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                    </div>

                    <div class="ms-auto">
                        <button   class="btn btn-primary radius-30 mt-2 mt-lg-0" type="submit"  >
                            <i class="bx bxs-search"></i>Search</button>
                    </div>
            </div>
            </form>

            <div class="table-responsive">

                <table class="table mb-0">
                    <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-Mail</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Total</th>
                        <th scope="col">Show</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{$order->id}}</th>
                            <td>{{$order->name}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->total}}</td>
                            <td><a href="{{route('admin.orders.show' , $order->id)}}" style="margin-left: 13px;"><i class="fadeIn animated bx bx-show-alt"></i></a></td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>

            </div>

            <div class="d-lg-flex align-items-center mt-4 gap-3">
                <div class="ms-auto">
                    {{ $orders->links() }}
                </div>
            </div>

        </div>
    </div>

@endsection

@section('css-custom')

@endsection

@section('js-custom')

@endsection
