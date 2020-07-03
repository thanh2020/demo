@extends('layouts.main')
@section('content')
{{dd($layout)}}
    <section class="content-header">
        <h1>
            Danh Sách Danh Mục <a href="{{route('admin.layout.create')}}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Thêm Danh Mục</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="box-tools">
                            <form action="{{asset('search/')}}" method="get">
                                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                       placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>Tên danh mục</th>
                                <th>Hình ảnh</th>
                                <th>Danh mục cha</th>
                                <th>Vị trí</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Hành động</th>

                            </tr>
                            </tbody>
                            <!-- Lặp một mảng dữ liệu pass sang view để hiển thị -->
                        
                                <tr class="item-">
                                    <td></td>
                                    <td>
                                        
                                            <img src="" width="50" height="50">
                                        
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-default">Xem</a>
                                        <a href="" class="btn btn-info">Sửa</a>
                                        <a href="" type="button" class="btn btn-danger" onclick="" >Xóa</a>
                                    </td>
                                </tr>
                            
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin">
                            
                        </ul>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection