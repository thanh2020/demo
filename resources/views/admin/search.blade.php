@extends('layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Kết quả Tìm Kiếm cho      <span style="color: red; padding-left: 15px">'{{$data}}'</span>
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
                    	@foreach($search as $tk)
                        <table class="table table-hover">
                            <p>{{$tk->name}}</p>
                            <img src="{{asset($tk->image)}}" alt="">
                            
                        </table>
                       	@endforeach
                    </div>
                    <!-- /.box-body -->
                    
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection