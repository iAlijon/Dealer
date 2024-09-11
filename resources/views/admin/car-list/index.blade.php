@extends('adminlte::page')

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
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="card-title"><i class="fas fa-car"></i> Ro'yxati</h3>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right p-0 bg-0">
                                    <li>
                                        <a href="{{route('cars-list.create')}}" class="btn btn-success text-right"><i class="fas fa-cart-plus"></i>  Qo'shish</a>
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
                                <th>Name</th>
                                <th>Model</th>
                                <th>Rasm</th>
                                <th>H/R</th>
                            </tr>
                            <form action="">
                                <input type="hidden" class="form_filter" value="true">
                                <button type="submit" class="d-none"></button>
                                <tr>
                                    <th></th>
                                    <th><input type="text" name="name_uz" value="{{isset($filter->name_uz)?$filter->name_uz:''}}" class="form-control form-control-sm"></th>
                                    <th><input type="text" name="model" value="{{isset($filter->model)?$filter->model:''}}" class="form-control form-control-sm"></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </form>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td>Name_uz</td>
                                <td>Models</td>
                                <td>Rasm<span class="tag tag-success"></span></td>
                                <td>Edit</td>
                            </tr>
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
