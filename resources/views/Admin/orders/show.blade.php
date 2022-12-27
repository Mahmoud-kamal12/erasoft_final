@extends('admin.layouts.app')

@section('content')


    <!--start page wrapper -->
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Orders</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">

                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3"><h5 class="card-title">order number : #{{$order->id}}</h5></div>

                        <div class="ms-auto">
                            <div class="btn-group">
                                <form action="{{route('admin.orders.destroy' , $order->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button  type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <hr/>
                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="border border-3 p-4 rounded">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Product Price</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                        </thead>

                                        <tbody >
                                        @foreach($order->items as $product)
                                            <tr>
                                                <td style="color: red">{{$product->product_name}}</td>
                                                <td style="color: red">{{$product->quantity}}</td>
                                                <td style="color: red">${{$product->product_price}}</td>
                                                <td style="color: red">${{$product->product_price * $product->quantity}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="border border-3 p-4 rounded">
                                    <div class="row g-3">

                                        <div class="col-md-12">
                                            <label for="inputPrice" class="form-label">Name</label>
                                            <input type="text" class="form-control" value="{{$order->name}}" disabled>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="inputCompareatprice" class="form-label">Country</label>
                                            <input type="text" class="form-control" value="{{$order->country}}" disabled>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="inputStarPoints" class="form-label">City</label>
                                            <input type="text" class="form-control" value="{{$order->city}}" disabled>
                                        </div>


                                        <div class="col-md-4">
                                            <label for="inputCostPerPrice" class="form-label">zip</label>
                                            <input type="text" class="form-control" value="{{$order->zip}}" disabled>
                                        </div>


                                        <div class="col-12">
                                            <label for="inputProductType" class="form-label">Address</label>
                                            <input type="text" class="form-control" value="{{$order->address}}" disabled>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputProductType" class="form-label">E-Mail</label>
                                            <input type="text" class="form-control" value="{{$order->email}}" disabled>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputProductType" class="form-label">Phone</label>
                                            <input type="text" class="form-control" value="{{$order->phone}}" disabled>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <p type="button" class="btn btn-primary">Total : {{$order->total}}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div><!--end row-->
                    </div>
                </div>
            </div>


        </div>
    <!--end page wrapper -->



@endsection

@section('css-custom')

@endsection

@section('js-custom')
    <script>

        const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;

        tinymce.init({
            selector: '#mytextarea',
            plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            editimage_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            toolbar_sticky_offset: isSmallScreen ? 102 : 108,
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            link_list: [
                { title: 'My page 1', value: 'https://www.tiny.cloud' },
                { title: 'My page 2', value: 'http://www.moxiecode.com' }
            ],
            image_list: [
                { title: 'My page 1', value: 'https://www.tiny.cloud' },
                { title: 'My page 2', value: 'http://www.moxiecode.com' }
            ],
            image_class_list: [
                { title: 'None', value: '' },
                { title: 'Some class', value: 'class-name' }
            ],
            importcss_append: true,
            file_picker_callback: (callback, value, meta) => {
                /* Provide file and text for the link dialog */
                if (meta.filetype === 'file') {
                    callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
                }

                /* Provide image and alt text for the image dialog */
                if (meta.filetype === 'image') {
                    callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
                }

                /* Provide alternative source and posted for the media dialog */
                if (meta.filetype === 'media') {
                    callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
                }
            },
            templates: [
                { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
                { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
                { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 600,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link image table',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });

    </script>
@endsection
