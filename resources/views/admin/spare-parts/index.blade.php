@extends('adminlte::page')

@section('title', 'Extiyot qsim qo\'shish')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Extiyot qsimlar ro'yxati</h1>
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
                                        <a href="{{route('spare-parts.create')}}" class="btn btn-info text-right"><i
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
                                <th>Extiyot qsim nomi</th>
                                <th>Kategoriyasi</th>
                                <th>Narx</th>
                                <th>Miqdori</th>
                                <th>Status</th>
                                <th>H/R</th>
                            </tr>
                            <form action="">
                                <input type="hidden" class="form_filter" value="true">
                                <button type="submit" class="d-none"></button>
                                <tr>
                                    <th></th>
                                    <th><input type="text" name="name_uz"
                                               value="{{isset($filter->name_uz)?$filter->name_uz:''}}"
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
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </form>
                            </thead>
                            <tbody>
                            @foreach($spare_parts as $key => $item)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$item->model}}</td>
                                    <td>{{$item->category->name_uz}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->count}}</td>
                                    <td>
                                        <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch>
                                        <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                                    </td>
                                    <td class="d-flex justify-content-around">
                                        <a href="{{route('spare-parts.show', $item->id)}}"><i class="fas fa-eye"></i></a>
                                        <a href="{{route('spare-parts.edit', $item->id)}}"><i class="fas fa-edit"></i></a>
                                        <a class="trash-car" href="#"
                                           data-id="{{$item->id}}"><i class="fas fa-trash"></i></a>
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
