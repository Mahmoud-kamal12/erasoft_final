@extends('admin.layouts.app')

@section('content')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Product</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add New</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
                @method('POST')
                @csrf

                <div class="row mb-3">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                        <input type="text" name="name" class="form-control" value="" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Price</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                        <input type="number" name="price" step="0.01" min="0" class="form-control" value="" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Quantity</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                        <input type="number" name="quantity" step="1" min="0" class="form-control" value="" />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Category</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                        <select name="category_id" class="single-select">
                            <option value="" selected disabled>Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Short Description</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                        <input type="text" name="short_description" step="1" min="0" class="form-control" value="" />
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Main Image</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                        <input class="form-control" type="file" id="formFile" name="main_image">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Images</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                        <input class="form-control" type="file" name="images[]" id="formFileMultiple" multiple>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Long Description</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                        <textarea id="mytextarea" name="long_description"></textarea>
                    </div>
                </div>



                <div class="row text-center">
                    <div class="col-sm-12 text-center text-secondary">
                        <button type="button" class="btn btn-primary mb-4 text-center" id="add_faq">+</button>

                        <div id="faqs_body">
                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Specification Name</h6>
                                </div>
                                <div class="col-sm-10 text-secondary">
                                    <input type="text" name="specifications[1][key]" class="form-control" value="Name" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <h6 class="mb-0">Specification Value</h6>
                                </div>
                                <div class="col-sm-10 text-secondary">
                                    <input type="text" name="specifications[1][value]" class="form-control" value="Value" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-sm-12 text-center text-secondary">
                        <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                    </div>
                </div>

            </form>
        </div>
    </div>

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


        $(document).on('click' , '#add_faq' , function (e){
            e.preventDefault();
            var i = 2 ;

            $("#faqs_body").append(`

                <hr class="my-2">

                <div class="row mb-3">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Specification Name</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                        <input type="text" name="specifications[${i}][key]" class="form-control" value="Name" />
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-sm-2">
                        <h6 class="mb-0">Specification Value</h6>
                    </div>
                    <div class="col-sm-10 text-secondary">
                        <input type="text" name="specifications[${i}][value]" class="form-control" value="Value" />
                    </div>
                </div>

            `);
            i++
        })


    </script>
@endsection
