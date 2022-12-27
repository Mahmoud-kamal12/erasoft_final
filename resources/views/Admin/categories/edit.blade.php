<form action="{{route('admin.categories.update' , $category->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">

        <div class="row mb-3">
            <div class="col-sm-2">
                <h6 class="mb-0">Name</h6>
            </div>
            <div class="col-sm-10 text-secondary">
                <input type="text" name="name" class="form-control" value="{{$category->name}}" />
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-2">
                <h6 class="mb-0">Description</h6>
            </div>
            <div class="col-sm-10 text-secondary">
                <input type="text" name="description" class="form-control" value="{{$category->description}}" />
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-2">
                <h6 class="mb-0">Enable Category</h6>
            </div>
            <div class="col-sm-10 text-secondary">
                <select name="enable" class="single-select">
                    <option value="1" @if($category->enable) selected @endif>Enable</option>
                    <option value="0" @if(!$category->enable) selected @endif>Disable</option>
                </select>

            </div>
        </div>


        <div class="row mb-3 text-center justify-content-center">
            <div class="col-sm-2 text-center justify-content-center">
                <img class='img-thumbnail' width="100" height="100" src="{{asset($category->cover)}}">
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

<script>
    $('.single-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
</script>
