@extends('shop.layouts.main')

@section('content')

<style>
    .list_start i:hover{
        cursor: pointer;
    }
    .list_text{
        /*margin-left: 10px;*/
        top: 10px;
        position: relative;
        background: #52b858;
        color: #fff;
        padding: 2px 8px;
        box-sizing: border-box;
        font-size: 12px;
        border-radius: 2px;
    }
    @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);
    /*reset css*/
    div,label{margin:0;padding:0;}
    body{margin:20px;}
    h1{font-size:1.5em;margin:10px;}
    /****** Style Star Rating Widget *****/
    .rating{border:none;float:left;}
    .rating .star-input{display:none;}/*ẩn input radio - vì chúng ta đã có label là GUI*/
    .rating>label:before{margin:5px;font-size:1.25em;font-family:FontAwesome;display:inline-block;content:"\f005";}/*1 ngôi sao*/
    .rating>.half:before{content:"\f089";position:absolute;}/*0.5 ngôi sao*/
    .rating>label{color:#ddd;float:right;}/*float:right để lật ngược các ngôi sao lại đúng theo thứ tự trong thực tế*/
    /*thêm màu cho sao đã chọn và các ngôi sao phía trước*/
    .rating .star-input:checked~label,
    .rating:not(:checked)>label:hover, 
    .rating:not(:checked)>label:hover~label{color:#FFD700;}
    /* Hover vào các sao phía trước ngôi sao đã chọn*/
    .rating .star-input:checked+label:hover,
    .rating .star-input:checked~label:hover,
    .rating .star-input:hover~input:checked~label,
    .rating .star-input:checked~label:hover~label{color:#FFED85;}


    .rating1{border:none;float:left;}
    .rating1 .star-input2{display:none;}/*ẩn input radio - vì chúng ta đã có label là GUI*/
    .rating1>label:before{margin:5px;font-size:1.25em;font-family:FontAwesome;display:inline-block;content:"\f005";}/*1 ngôi sao*/
    .rating1>.half:before{content:"\f089";position:absolute;}/*0.5 ngôi sao*/
    .rating1>label{color:#ddd;float:right;}/*float:right để lật ngược các ngôi sao lại đúng theo thứ tự trong thực tế*/
    /*thêm màu cho sao đã chọn và các ngôi sao phía trước*/
    .rating1 .star-input2:checked~label,
    .rating1:not(:checked)>label:hover, 
    .rating1:not(:checked)>label:hover~label{color:#FFD700;}
    /* Hover vào các sao phía trước ngôi sao đã chọn*/
    .rating1 .star-input2:checked+label:hover,
    .rating1 .star-input2:checked~label:hover,
    .rating1>label:hover~input:checked~label,
    .rating1 .star-input2:checked~label:hover~label{color:#FFED85;}

</style>
    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- BSTORE-BREADCRUMB START -->
                    <div class="bstore-breadcrumb">
                        <a href="/">Trang chủ<span><i class="fa fa-caret-right"></i> </span> </a>
                        <span> <i class="fa fa-caret-right"> </i> </span>
                        <a href="shop-gird.html">{{ $category->name }}</a>
                    </div>
                    <!-- BSTORE-BREADCRUMB END -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <!-- SINGLE-PRODUCT-DESCRIPTION START -->
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
                            <div class="single-product-view">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="thumbnail_1">
                                        <div class="single-product-image">
                                            <img src="{{ asset($product->image) }}" alt="single-product-image" />
                                            <a class="new-mark-box" href="#">new</a>
                                            <a class="fancybox" href="img/product/sale/1.jpg" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="select-product">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs select-product-tab bxslider">
                                    <li class="active">     
                                        <p><span>{!! $product->summary !!}</span></p>
                                        
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
                            <div class="single-product-descirption">
                                <h2>{{$product->name}}</h2>
                                <div class="single-product-social-share">
                                    <p>Tình trạng:
                                        @if ($product->stock > 0)
                                            <span style="color: green">CÒN HÀNG</span>
                                        @else 
                                            <span style="color: red">HẾT HÀNG</span>
                                        @endif
                                    </p>
                                </div>
                                <div class="single-product-review-box">
                                    <div class="rating-box">
                                        <!-- <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-empty"></i> -->
                                        <div class="rating">
                                            <input type="radio" id="star5" class="star-input" name="rating" value="5" />
                                            <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                         
                                            <input type="radio" id="star4" class="star-input" name="rating" value="4" />
                                            <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                         
                                            <input type="radio" id="star3" class="star-input" name="rating" value="3" />
                                            <label class = "full" for="star3" title="Meh - 3 stars"></label>
                                         
                                            <input type="radio" id="star2" class="star-input" name="rating" value="2" />
                                            <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                         
                                            <input type="radio" id="star1" class="star-input" name="rating" value="1" />
                                            <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                        </div>
                                    </div>

                                    <div class="read-reviews">
                                        <a href="#">Read reviews (1)</a>
                                    </div>
                                    <div class="write-review">
                                        <a href="#">Write a review</a>
                                    </div>
                                </div>
                                <div class="single-product-condition">
                                    <p>Reference: <span>demo_1</span></p>
                                    <p>Condition: <span>New product</span></p>
                                </div>
                                <div class="single-product-price">
                                    <h2>{{number_format("$product->sale",0,",",".")}}  <span style="text-transform: lowercase;">đ</span></h2>
                                </div>
                                <div class="single-product-desc">
                                    <p>Faded short sleeves t-shirt with high neckline. Soft and stretchy material for a comfortable fit. Accessorize with a straw hat and you're ready for summer!</p>
                                    <div class="product-in-stock">
                                        <p>Trong kho<span>{{$product->stock}} sản phẩm</span></p>
                                    </div>
                                </div>
                                <div class="single-product-info">
                                    <a href="#"><i class="fa fa-envelope"></i></a>
                                    <a href="#"><i class="fa fa-print"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                </div>
                                
                                <div class="single-product-color">
                                    <p class="small-title">Color </p>
                                    <a href="#"><span></span></a>
                                    <a class="color-blue" href="#"><span></span></a>
                                </div>
                                <div class="single-product-add-cart">
                                    <a class="add-cart-text" title="Add to cart" href="{{asset('cart/add/'.$product->id)}}">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container" style="display: flex; align-items: center; border: 1px solid pink">
                        <div style="width: 20%; font-size: 40px;color: #fd9727;line-height: 40px; padding: 0 30px;" class="rating">
                            <b>
                                @if($total_rating > 0)
                                    {{round($total_point / $total_rating,1)}}
                                @else 2.5
                                @endif
                            </b>

                            <span>
                                <i class="fa fa-star"></i>
                            </span>
                        </div>

                        <div style="width: 60%; padding: 20px;">                            
                            @for($i = 5; $i >= 1; $i--)
                            <div style="width: 100%; float: left;display: flex; align-items: center">
                                <div style="width: 10%;">                                   
                                    <div style="">
                                        {{$i}} <i class="fa fa-star"></i>
                                    </div>                                    
                                </div>
                                <div style="width: 70%;">
                                    <span style="display: block; height: 6px; border: 1px solid #dedede; border-radius: 5px" >
                                        @if($total_rating > 0)
                                            {{round(($groupByPoint[$i]['sum_point'] ?? 0) * 100 / $total_rating)}}
                                        @endif                                
                                    %</span>
                                </div>
                                <div style="width: 20%; padding: 10px;">
                                    <a href="">{{data_get($groupByPoint,"$i.sum_point", 0)}} đánh giá</a>
                                </div>                                
                            </div>                            
                            @endfor
                        </div>

                        <div style="width: 20%;display: block;width: 200px;color: #fff;border-radius: 5px;text-align: center;box-sizing: border-box;"><a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Gửi đánh giá của bạn</a>
                        </div>
                    </div>
                    
                    <div class="collapse" id="collapseExample">
                      <div class="card card-body">
                        <div class="collapse" id="collapseExample" class="form_rating hide" style="display: block;">
                            
                        <form role="form" action="{{route('admin.rating.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card card-body" style="margin: 20px">
                                <p style="font-size: 15px;width: 200px;">Chọn đánh giá của bạn :</p>
                                <span class="list_start rating-box">
                                    <div class="rating1" style="padding-top: 10px;">
                                        @for($i = 1; $i <= 5; $i++)
                                        <input type="radio"  class="star5" name="rating" value="{{$i}}" />
                                        <!-- <label class ="full" data-star="{{$i}}" for="star{{$i}}" title=""></label> -->
                                        <!-- <span class="star5 star-input" name="rating" value="{{$i}}">
                                            <i class="fa fa-star"></i></span> -->
                                        @endfor
                                    </div>  
                                </span>
                                <div class="form-group">
                                    <input type="hidden" name="point" id="hdfStar" value="">
                                    <input type="hidden" name="product_id" id="hdfProductID" value="{{$product->id}}">
                                    <!-- <input type="hidden" name="RatingImg" class="hdfRatingImg" value="{{asset($product->image)}}"> -->
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <textarea name="content" class="form-control" rows="3" placeholder="Nhập đánh giá về sản phẩm" ></textarea>
                                        
                                            @if($errors->has('content'))
                                                {{$errors->first('content')}}
                                            @endif
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">  
                                        <input type="text" class="form-control" name="name" placeholder="Nhập Họ tên">
                                    </div> 
                                    <div class="form-group">  
                                        <input type="text" class="form-control" name="email" placeholder="Nhập Email">
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" style="background: #337ab7;padding: 5px;border-radius: 3px;color: white;">Gửi đánh giá</button>
                                </div>
                            </div>
                        </form>
                        </div>
                      </div>
                    </div>
                        

                    <!-- SINGLE-PRODUCT-DESCRIPTION END -->
                    <!-- SINGLE-PRODUCT INFO TAB START -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="product-more-info-tab">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs more-info-tab">

                                    <div class="fb-comments" data-href="{{$url}}" data-numposts="5" data-width=""></div>

                                    <li class="active"><a href="#moreinfo" data-toggle="tab">more info</a></li>
                                    <li><a href="#datasheet" data-toggle="tab">data sheet</a></li>
                                    <li><a href="#review" data-toggle="tab">reviews</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="moreinfo">
                                        <div class="tab-description">
                                            <p>{!! $product->description !!}</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="datasheet">
                                        <div class="deta-sheet">
                                            <table class="table-data-sheet">
                                                <tbody>
                                                <tr class="odd">
                                                    <td>Compositions</td>
                                                    <td>Cotton</td>
                                                </tr>
                                                <tr class="even">
                                                    <td class="td-bg">Styles</td>
                                                    <td class="td-bg">Casual</td>
                                                </tr>
                                                <tr class="odd">
                                                    <td>Properties</td>
                                                    <td>Short Sleeve</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="review">
                                        <div class="row tab-review-row">
                                            <div class="col-xs-5 col-sm-4 col-md-4 col-lg-3 padding-5">
                                                <div class="tab-rating-box">
                                                    <span>Grade</span>
                                                    <div class="rating-box">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-empty"></i>
                                                    </div>
                                                    <div class="review-author-info">
                                                        <strong>write A REVIEW</strong>
                                                        <span>06/22/2015</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-7 col-sm-8 col-md-8 col-lg-9 padding-5">
                                                <div class="write-your-review">
                                                    <p><strong>write A REVIEW</strong></p>
                                                    <p>write A REVIEW</p>
                                                    <span class="usefull-comment">Was this comment useful to you? <span>Yes</span><span>No</span></span>
                                                    <a href="#">Report abuse </a>
                                                </div>
                                            </div>
                                            <a href="#" class="write-review-btn">Write your review!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- SINGLE-PRODUCT INFO TAB END -->
                    <!--Nổi bật-->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="left-title-area">
                                <h2 class="left-title">Sản phẩm nổi bật</h2>
                            </div>
                        </div>
                        <div class="row">
                            <ul class="gategory-product">
                                @if($hot)
                                @foreach($hot as $item)
                                
                                <li class="gategory-product-list col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="{{ route('shop.product', ['category' => $category->slug, 'slug' => $item->slug , 'id' => $item->id]) }}" title="{{ $product->name }}" ><img src="{{ asset($item->image) }}" alt="{{ $item->name }}"></a>
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
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!-- RELATED-PRODUCTS-AREA START -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="left-title-area">
                                <h2 class="left-title">Sản phẩm liên quan</h2>
                            </div>
                        </div>
                        <div class="row">
                            <ul class="gategory-product">
                                @foreach($relatedProducts as $item)
                                <li class="gategory-product-list col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="single-product-item">
                                        <div class="product-image">
                                            <a href="{{ route('shop.product', ['category' => $category->slug, 'slug' => $item->slug , 'id' => $item->id]) }}" title="{{ $product->name }}" ><img src="{{ asset($item->image) }}" alt="{{ $item->name }}"></a>
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
                    </div>
                    <!-- RELATED-PRODUCTS-AREA END -->
                </div>
                <!-- RIGHT SIDE BAR START -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- SINGLE SIDE BAR START -->
                    <!-- <div class="single-product-right-sidebar">
                        <h2 class="left-title">nổi bật</h2>
                        <ul>

                            @foreach($hot as $item)
                            <li>
                                <a href="{{route('shop.product',['category' => $category->slug, 'slug' => $item->slug, 'id' => $item->id])}}"><img  style="float: left" width="70px" src="{{asset($item->image)}}" alt="" /></a>
                                <div class="r-sidebar-pro-content">
                                    <h5><a href="#">{{$item->name}}</a></h5>
                                    <p>Faded short sleeves t-shirt with high...</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div> -->
                    <!-- SINGLE SIDE BAR END -->
                    <!-- SINGLE SIDE BAR START -->
                    <div class="single-product-right-sidebar clearfix">
                        <h2 class="left-title">Tags </h2>
                        <div class="category-tag">
                            <a href="#">fashion</a>
                            <a href="#">handbags</a>
                            <a href="#">women</a>
                            <a href="#">men</a>
                            <a href="#">kids</a>
                            <a href="#">New</a>
                            <a href="#">Accessories</a>
                            <a href="#">clothing</a>
                            <a href="#">New</a>
                        </div>
                    </div>
                    <!-- SINGLE SIDE BAR END -->
                    <!-- SINGLE SIDE BAR START -->
                    
                </div>
                <!-- SINGLE SIDE BAR END -->
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $(".star5").click(function () {
                star = $(this).val();
                $('#hdfStar').val(star);
            });
        });
    </script>
@endsection