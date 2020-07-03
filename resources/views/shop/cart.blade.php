@extends('shop.layouts.main')

@section('content')

<section class="main-content-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- BSTORE-BREADCRUMB START -->
				<div class="bstore-breadcrumb">
					<a href="index.html">HOMe</a>
					<span><i class="fa fa-caret-right&#9;"></i></span>
					<span>Your shopping cart</span>
				</div>
				<!-- BSTORE-BREADCRUMB END -->
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- SHOPPING-CART SUMMARY START -->
				<h2 class="page-title">Shopping-cart summary <span class="shop-pro-item">Your shopping cart contains: 2 products</span></h2>
				<!-- SHOPPING-CART SUMMARY END -->
			</div>	
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<!-- TABLE START -->
					<table class="table table-bordered" id="cart-summary">
						<!-- TABLE HEADER START -->
						<thead>
							<tr>
								<th class="cart-product">Product</th>
								<th class="cart-description">Description</th>
								<th class="cart-avail text-center">Availability</th>
								<th class="cart-unit text-right">Unit price</th>
								<th class="cart_quantity text-center">Qty</th>
								<th class="cart-delete">&nbsp;</th>
								<th class="cart-total text-right">Total</th>
							</tr>
						</thead>
						<!-- TABLE HEADER END -->
						<!-- TABLE BODY START -->
						<tbody>	
							@foreach($data as $item)
							
							<tr>
								<td class="cart-product">
									<a href="#"><img alt="Blouse" src="{{asset($item->options->image)}}"></a>
								</td>
								<td class="cart-description">
									<p class="product-name"> {{$item->name}}</p>
									<small>số lượng: {{$item->qty}}</small>
									<small><a href="#">Size : S, Color : Orange</a></small>
								</td>
								<td class="cart-avail"><span class="label label-success">In stock</span></td>
								<td class="cart-unit">
									<ul class="price text-right">
										<li class="price">{{number_format("$item->price")}}đ</li>
									</ul>
								</td>
								<td class="cart_quantity text-center">
									<div class="cart-plus-minus-button">
										<form action="/cart/update" method="POST">
											@csrf
											<input name="qty" class="cart-plus-minus" type="text" value="{{$item->qty}}">
											<input name="rowId" class="cart-plus-minus" type="hidden" value="{{$item->rowId}}">
											<input type="submit" value="Cập nhật" class=" btn-success">
										</form>
									</div>
								</td>
								<td class="cart-delete text-center">
									<span>
										<a title="Delete" class="cart_quantity_delete" href="{{$item->rowId}}"><i class="fa fa-trash-o"></i></a>
									</span>
								</td>
								<td class="cart-total">
									<span class="price">{{number_format($item->price*$item->qty)}}đ</span>
								</td>
							</tr>
							@endforeach
							<!-- SINGLE CART_ITEM END -->
						</tbody>
						<!-- TABLE BODY END -->
						<!-- TABLE FOOTER START -->
						<tfoot>										
							<tr class="cart-total-price">
								<td class="cart_voucher" rowspan="4" colspan="3"></td>
								<!-- <td class="text-right" colspan="3">Total products (tax excl.)</td>
								<td class="price" id="total_product" colspan="1">$76.46</td> -->
							</tr>
							<tr>
								<!-- <td class="text-right" colspan="3">Total shipping</td>
								<td class="price" id="total_shipping" colspan="1">$5.00</td> -->
							</tr>
							<tr>
								<!-- <td class="text-right" colspan="3">Total vouchers (tax excl.)</td>
								<td class="price" colspan="1">$0.00</td> -->
							</tr>
							<tr>
								<td class="total-price-container text-right" colspan="3">
									<span>Tổng thanh toán</span>
								</td>
								<td class="price" id="total-price-container" colspan="1">
									<span id="total-price">{{Cart::subtotal(0)}}vnđ</span>
								</td>
							</tr>
						</tfoot>		
						<!-- TABLE FOOTER END -->									
					</table>
					<!-- TABLE END -->
				</div>
				<!-- CART TABLE_BLOCK END -->
			</div>
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- RETURNE-CONTINUE-SHOP START -->
				<div class="returne-continue-shop">
					<a class="continueshoping" href="/"><i class="fa fa-chevron-left"></i>Tiếp tục mua hàng</a>
					<a class="procedtocheckout" href="/cart/checkout">Đặt hàng<i class="fa fa-chevron-right"></i></a>
				</div>	
				<!-- RETURNE-CONTINUE-SHOP END -->						
			</div>
		</div>
	</div>
</section>
@endsection