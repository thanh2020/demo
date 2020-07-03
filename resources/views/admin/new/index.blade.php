@extends('layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Danh Mục Tin Tức<a href="{{route('admin.new.create')}}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Thêm Tin tức</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="box-tools">
                            <form action="" method="get">
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
                                <th>Tóm tắt</th>
                                <th>Mô tả</th>
                                <th>Vị trí</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Hành động</th>

                            </tr>
                            </tbody>
                            <!-- Lặp một mảng dữ liệu pass sang view để hiển thị -->
                            @foreach($news as $key => $new)
                                <tr class="item-">
                                    <td>{{$new->name}}</td>
                                    <td>
                                        
                                            <img src="{{asset($new->image)}}" width="50" height="50">
                                        
                                    </td>
                                    <td>{{$new->summary}}</td>
                                    <td>{{$new->description}}</td>
                                    <td>{{$new->position}}</td>
                                    <td>{{$new->is_active}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.new.show', [$new->id ])}}" class="btn btn-default">Xem</a>
                                        <a href="" class="btn btn-info">Sửa</a>
                                        <a href="{{asset(route('delete',[$new->id]))}}" type="button" class="btn btn-danger" onclick="alert('ok xoa')" >Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
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