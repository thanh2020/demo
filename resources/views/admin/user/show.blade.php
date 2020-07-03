@extends('layouts.main')
@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <h1>
                    Thông tin chi tiết sản phẩm
                </h1>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin sản phẩm</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td><b>Tên User:</b></td>
                                <td>{{ $data->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Avatar:</b></td>
                                <td>{{ $data->avatar }}</td>
                            </tr>
                            <tr>
                                <td><b>Email:</b></td>
                                <td>{{ $data->email }}</td>
                            </tr>
                            <tr>
                                <td><b>Quyền</b></td>
                                <td>{{$data->role_id}}</td>
                            </tr>
                            <tr>
                                <td><b>Trạng thái</b></td>
                                <td>@if($data->is_active ==0)Ẩn @else Kích hoạt @endif</td>
                            </tr>

                            </tbody></table>
                    </div>
                </div>
                <!-- /.box -->


            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection