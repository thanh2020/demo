@extends('layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Danh Sách Product <a href="{{route('admin.product.create')}}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Thêm Sản phẩm</a>
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
                                <th>TT</th>
                                <th>Tên SP</th>
                                <th>Hình ảnh</th>
                                <th>Số lượng</th>
                                <th>Giá KM</th>
                                <th>Giá Gốc</th>
                                <th>Sản phẩm Hot</th>
                                <th>Vị trí</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </tbody>
                            <!-- Lặp một mảng dữ liệu pass sang view để hiển thị -->
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                    <td>{{$key}}</td>
                                    <td>{{ substr($item->name,0,30) }}</td>
                                    <td>
                                    @if ($item->image) <!-- Kiểm tra hình ảnh tồn tại -->
                                        <img src="{{asset($item->image)}}" width="50" height="50">
                                        @endif
                                    </td>
                                    <td>{{ $item->stock }}</td>
                                    <td>{{ $item->sale }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ ($item->is_hot == 1) ? 'Có' : 'Không' }}</td>
                                    <td>{{ $item->position }}</td>
                                    <td>{{ ($item->is_active == 1) ? 'Hiển thị' : 'Không Hiển thị' }}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.product.show', ['id'=> $item->id ])}}" class="btn btn-default">Xem</a>
                                        <a href="{{route('admin.product.edit', ['id'=> $item->id])}}" class="btn btn-info">Sửa</a>
                                        <!-- Thêm sự kiện onlick cho nút xóa -->
                                        <a href="javascript:void(0)" class="btn btn-danger" onclick="destroyProduct({{ $item->id }})" >Xóa</a>
                                        <!-- <a href="{{asset('add/product')}}" class="btn btn-default">Thêm ảnh</a> -->
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin">
                            {{ $data->links() }}
                        </ul>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection