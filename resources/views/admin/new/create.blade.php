@extends('layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Thêm mới tin tức <a href="" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thêm tin tức</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.new.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tin tức</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tin tức">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File</label>
                                <input type="file" id="image" name="image">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" name="is_active"> Trạng thái
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tóm tắt</label>
                                <label>Summary</label>
                                <textarea name="summary" class="form-control" rows="3" ></textarea>
                            </div>
                            <div class="form-group">
                                <label>Meta Description</label>
                                <textarea name="description" class="form-control" rows="3" ></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Vị trí</label>
                                <input type="text" class="form-control" id="position" name="position" placeholder="Nhập tên vị trí" value="0">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Tạo</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection