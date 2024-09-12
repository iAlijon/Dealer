@extends('adminlte::page')

@section('title', 'Yangi avtomabil qo\'shish')

@section('plugins.BootstrapColorpicker', true)

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Qo'shish</h1>
                </div>

            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-car-alt"></i> Qo'shish</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{route('cars-list.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- text input -->
                            <div class="form-group">
                                <label>Kategoriyasi</label>
                                <select class="form-control select2bs4" style="width: 100%;" name="category_id" id="category_id">
                                    <option selected="selected">---</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name_uz}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Pozitsiyasi</label>
                                <select class="form-control select2bs4" style="width: 100%;" name="sub_category_id" id="sub_category_id">
                                    <option selected="selected">---</option>
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}">{{$sub_category->name_uz}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Madeli</label>
                                <input type="text" name="model" class="form-control" placeholder="Enter ...">
                            </div>

                            <div class="form-group">
                                <label>Rangi</label>
                                <input type="text" name="color" class="form-control my-colorpicker1" placeholder="Color ...">
                            </div>

                            <div class="form-group">
                                <label>Rasmi</label>
                                <input type="file" name="photo" class="form-control" accept=".png,.jpg,.jpeg,.svg">
                            </div>

                            <!-- textarea -->
                            <div class="form-group">
                                <label>To'liq ma'lumoti</label>
                                <textarea class="summernote" name="info"></textarea>
                            </div>
                        </form>
                    </div>

                    <!--/.card-footer -->

                    <div class="card-footer text-right">
                        <button class="btn btn-success"><i class="fas fa-save"></i> Saqlash</button>
                    </div>
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

        $('#category_id').change(function (){
            let id = $(this).val();
            let url = "{{route('sub-category', ":id")}}"
            url = url.replace(':id', id)
            $.ajax({
                url: url,
                type: 'get',
                dataType: 'JSON',
                success: function (data){
                    $('#sub_category_id').empty();
                    $('#sub_category_id').append('<option>---</option>')
                    data.forEach(function (v, i){
                        $('#sub_category_id').append('<option value='+v.id+'>'+ v.name_uz+'</option>')
                    })
                }
            })
        })

    </script>
@endpush

