@extends('adminlte::page')

@section('plugins.BootstrapColorpicker', true)

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>O'zgartirish</h1>
                </div>

            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-car-alt"></i> Qo'shish</h3>
                    </div>
                    <!-- /.card-header -->

                    <form action="{{route('cars-list.store')}}" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                        @csrf
                        <!-- text input -->
                            <div class="form-group">
                                <label>Kategoriyasi</label>
                                <select class="form-control select2bs4"
                                        {{$errors->has('category_id')?'is-invalid':''}} style="width: 100%;"
                                        name="category_id"
                                        id="category_id">
                                    <option selected="selected">---</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$carItem->category_id == $category->id?'selected':''}}>
                                            {{$category->name_uz}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Pozitsiyasi</label>
                                <select class="form-control select2bs4"
                                        {{$errors->has('sub_category_id')?'is-invalid':''}} style="width: 100%;"
                                        name="sub_category_id"
                                        id="sub_category_id">
                                    <option selected="selected">---</option>
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}" {{$carItem->sub_category_id == $sub_category->id?'selected':''}}>
                                            {{$sub_category->name_uz}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Madeli</label>
                                <input type="text" name="model" value="{{$carItem->model}}" class="form-control" placeholder="Model ...">
                                <small class="text-danger">{{$errors->first('model')}}</small>
                            </div>

                            <div class="form-group">
                                <label>Narxi</label>
                                <input type="number" name="price" value="{{$carItem->price}}" class="form-control" placeholder="Price ...">
                                <small class="text-danger">{{$errors->first('price')}}</small>
                            </div>

                            <div class="form-group">
                                <label>Rangi</label>
                                <input type="text" name="color"  value="{{$carItem->color}}" class="form-control my-colorpicker1"
                                       placeholder="Color ...">
                                <small class="text-danger">{{$errors->first('color')}}</small>
                            </div>

                            <div class="form-group">
                                <label>Rasmi</label>
                                <input type="file" name="photo"  value="{{$carItem->photo}}" class="form-control" accept=".png,.jpg,.jpeg,.svg">
                                <small class="text-danger">{{$errors->first('photo')}}</small>
                            </div>

                            <!-- textarea -->
                            <div class="form-group">
                                <label>To'liq ma'lumoti</label>
                                <textarea class="summernote" name="info">{{old('info',$carItem->info)}}</textarea>
                                <small class="text-danger">{{$errors->first('info')}}</small>
                            </div>
                        </div>
                        <!--/.card-footer -->

                        <div class="card-footer text-right">
                            <button class="btn btn-success"><i class="fas fa-save"></i> Saqlash</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script type="text/javascript">
        $('.my-colorpicker1').colorpicker()

        $('.summernote').summernote({
            height: 150
        });

        $('#category_id').change(function () {
            let id = $(this).val();
            let url = "{{route('sub-category', ":id")}}"
            url = url.replace(':id', id)
            console.log(url)
            $.ajax({
                url: url,
                type: 'get',
                dataType: 'JSON',
                success: function (data) {
                    console.log(data)
                    $('#sub_category_id').empty();
                    $('#sub_category_id').append('<option>---</option>')
                    data.forEach(function (v, i) {
                        $('#sub_category_id').append('<option value=' + v.id + '>' + v.name_uz + '</option>')
                    })
                }
            })
        })

    </script>
@endpush
