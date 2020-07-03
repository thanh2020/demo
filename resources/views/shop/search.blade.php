@extends('shop.layouts.main')

@section('content')
<section class="main-content-section">
<div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="left-title-area">
                    <h2 class="left-title">kết quả tìm kiếm <span style="color: red;">{{$data}} ({{$search->total()}})</span></h2>
                </div>
            </div>
            <div class="row">
                
                <ul class="gategory-product">
                    @foreach($search as $item)
                    <li class="gategory-product-list col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{asset($item->image)}}" title="{{ $item->name }}" ><img src="{{ asset($item->image) }}" alt="{{ $item->name }}"></a>
                                <div class="overlay-content">
                                    <ul>
                                        <li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
                                        <li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
                                        <li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="" title="{{ $item->name }}">{{ $item->name }}</a>
                                <div class="price-box">
                                    <span class="price">{{ number_format($item->sale,0,",",".") }}đ<span class="p-price"></span></span>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>

            </div>
            {{$search->links()}}
        </div>
    </div>
</section>
@endsection