@extends('adminlte::page')

@push('css')
    <style>
        .color {
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }

        th {
            color: #17a2b8;
        }

        a {
            color: #17a2b8;
        }

        a:hover {
            color: #17a2b8;
        }
    </style>
    @php($categories = \App\Models\Category::all())
    @php($sub_categories = \App\Models\SubCategory::all())
@endpush
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mashinalar ro'yxati</h1>
                </div>

            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="card-title"><i class="fas fa-car"></i> Ro'yxati</h3>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right p-0 bg-0">
                                    <li>
                                        <a href="{{route('cars-list.create')}}" class="btn btn-info text-right"><i
                                                class="fas fa-cart-plus"></i> Qo'shish</a>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-5">

                        <table class="table table-bordered table-striped table-hover ">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Model</th>
                                <th>Kategoriyasi</th>
                                <th>Pozitsiyasi</th>
                                <th>Narx</th>
                                <th>H/R</th>
                            </tr>
                            <form action="">
                                <input type="hidden" class="form_filter" value="true">
                                <button type="submit" class="d-none"></button>
                                <tr>
                                    <th></th>
                                    <th><input type="text" name="model"
                                               value="{{isset($filter->model)?$filter->model:''}}"
                                               class="form-control form-control-sm"></th>
                                    <th>
                                        <select name="category_id" id="category_id" onchange="this.form.submit()"
                                                class="form-control form-control-sm select2bs4">
                                            <option value="">---</option>
                                            @foreach($categories as $category)
                                                <option
                                                    value="{{$category->id}}"
                                                    {{isset($filter->category_id)?$filter->category_id == $category->id:false?'selected':''}}
                                                >{{$category->name_uz}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th>
                                        <select name="sub_category_id" id="sub_category_id" onchange="this.form.submit()"
                                                class="form-control form-control-sm select2bs4">
                                            <option value="">---</option>
                                            @foreach($sub_categories as $sub_category)
                                                <option
                                                    value="{{$sub_category->id}}"
                                                    {{isset($filter->sub_category_id)?$filter->sub_category_id == $sub_category->id:false?'selected':''}}
                                                >{{$sub_category->name_uz}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <th></th>
                                </tr>
                            </form>
                            </thead>
                            <tbody>
                            @foreach($items as $key => $item)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$item->model}}</td>
                                    <td>{{$item->category->name_uz}}</td>
                                    <td>{{$item->subCategory->name_uz}}</td>
                                    <td>{{$item->price}}</td>
                                    <td class="d-flex justify-content-around">
                                        <a href="{{route('cars-list.edit', $item->id)}}"><i class="fas fa-edit"></i></a>
                                        <form action="{{route('cars-list.destroy', $item->id)}}" method="delete">
                                            <a href="#"><i class="fas fa-trash"></i></a>
                                        </form>
                                        <a href="{{route('cars-list.show', $item->id)}}"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection


