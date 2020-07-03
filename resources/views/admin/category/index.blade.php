@extends('layouts.main')
@section('content')
    <section class="content-header">

        <!-------///////--Bootstrap---->

        <div class="container">
          <h2>Modal Example</h2>
          <!-- Button to Open the Modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Open modal
          </button>

          <!-- The Modal -->
          <div class="modal" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Modal Heading</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

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
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}">
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if ($item->image)
                                            <img src="{{asset($item->image)}}" width="50" height="50">
                                        @endif
                                    </td>
                                    <td>{{ $item->parent->name or '(trống)' }}</td>
                                    <td>{{ $item->position }}</td>
                                    <td class="{{ $item->get($item->is_active)['class'] }}">{{ $item->get($item->is_active)['name1'] }}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.category.show', ['id'=> $item->id ])}}" class="btn btn-default">Xem</a>
                                        <a href="{{route('admin.category.edit', ['id'=> $item->id])}}" class="btn btn-info">Sửa</a>
                                        <a href="javascript:void(0)" type="button" class="btn btn-danger" onclick="destroyCategory({{ $item->id }})" >Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                
                <!-- Modal body -->
                <div class="modal-body">
                  Modal body..
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
                

                
              </div>
            </div>
          </div>
  
        </div>



        <!-------///////--end Bootstrap---->

        <h1>
            Danh Sách Danh Mục <a href="{{route('admin.category.create')}}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Thêm Danh Mục</a>
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
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}">
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        @if ($item->image)
                                            <img src="{{asset($item->image)}}" width="50" height="50">
                                        @endif
                                    </td>
                                    <td>{{ $item->parent->name or '(trống)' }}</td>
                                    <td>{{ $item->position }}</td>
                                    <td>{{ $item->is_active }}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.category.show', ['id'=> $item->id ])}}" class="btn btn-default">Xem</a>
                                        <a href="{{route('admin.category.edit', ['id'=> $item->id])}}" class="btn btn-info">Sửa</a>
                                        <a href="javascript:void(0)" type="button" class="btn btn-danger" onclick="destroyCategory({{ $item->id }})" >Xóa</a>
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