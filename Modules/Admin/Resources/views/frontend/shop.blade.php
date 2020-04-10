@extends('admin::frontend.layouts.master')
@section('page_specific_css')
    <link rel="stylesheet" type="text/css" href="{{ getPublicFiles('frontend/css/jquery-ui1.css')}}">
@endsection
@section('page_specific_scripts')
   
	<script src="{{ getPublicFiles('frontend/js/jquery-ui.js')}}"></script>
	
	<script>
		//<![CDATA[ 
		$(window).load(function () {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 9000,
				values: [50, 6000],
				slide: function (event, ui) {
					$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
				}
			});
			$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

		}); //]]>
	</script>
    <!-- //price range (top products) -->
   
	<script src="{{ getPublicFiles('frontend/js/shop.js')}}"></script>
	 
@endsection
@section('content')

    <!-- Page Wrapper -->
    <div id="wrapper" class="frontend-wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
   
            <!-- Main Content -->
            <div id="content">    
                
            @include('admin::frontend.common.header')
    
                <!-- Begin Page Content -->
                <div class="container-fluid">

					<!-- //banner -->
						<!-- top Products -->
						<div class="ads-grid_shop">
							<div class="shop_inner_inf">
								<!-- tittle heading -->
								<div class="left-ads-display col-md-12">
								<div class="wrapper_top_shop">
									<!-- <div class="col-md-6 shop_left">
										<img src="{{ getPublicFiles('frontend/images/banner3.jpg')}}" alt="">
										<h6>40% off</h6>
									</div>
									<div class="col-md-6 shop_right">
										<img src="{{ getPublicFiles('frontend/images/banner2.jpg')}}" alt="">
										<h6>50% off</h6>
									</div> -->
									<div class="clearfix"></div>
									<!-- product-sec1 -->
									<div class="product-sec1">
										<!--/mens-->
										<div class="col-md-3 product-men" v-for="item in list">
											<div class="product-shoe-info shoe">
												<div class="men-pro-item" v-if="item">
													<div class="men-thumb-item">
														<img :src="item.product_img" alt="">
														<div class="men-cart-pro">
															<div class="inner-men-cart-pro">
																<a href="single.html" class="link-product-add-cart">Quick View</a>
															</div>
														</div>
														<!-- <span class="product-new-top">New</span> -->
													</div>
													<div class="item-info-product">
														<h4>
															<a href="single.html">@{{ item.name }} </a>
														</h4>
														<div class="grid-price ">
															<span class="money ">@{{ item.price }}</span>
														</div>
														<!-- <div class="info-product-price">
															<div class="grid_meta">
																<div class="product_price">
																	<div class="grid-price ">
																		<span class="money ">@{{ item.price }}</span>
																	</div>
																</div>
																<ul class="stars">
																	<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
																	<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
																</ul>
															</div>
															<div class="shoe single-item hvr-outline-out">
																<form action="#" method="post">
																	<input type="hidden" name="cmd" value="_cart">
																	<input type="hidden" name="add" value="1">
																	<input type="hidden" name="shoe_item" value="Bella Toes">
																	<input type="hidden" name="amount" value="675.00">
																	<button type="submit" class="shoe-cart pshoe-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>

																	<a href="#" data-toggle="modal" data-target="#myModal1"></a>
																</form>

															</div>
														</div> -->
														<div class="clearfix"></div>
													</div>
												</div>
											</div>
										</div>
										
										<!-- //mens -->
										<div class="clearfix"></div>

									</div>

									<!-- //product-sec1 -->
									<!-- <div class="col-md-6 shop_left shp">
										<img src="images/banner4.jpg" alt="">
										<h6>21% off</h6>
									</div>
									<div class="col-md-6 shop_right shp">
										<img src="images/banner1.jpg" alt="">
										<h6>31% off</h6>
									</div> -->
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>

                    
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

@endsection


<!-- Content Row -->
<!-- <div class="row">
                        <div class="col-lg-6 mb-4" v-for="item in list">

                            
                            <div class="card shadow mb-4" v-if="item">
                                <div class="card-header py-3">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h6 class="m-0 font-weight-bold text-primary">@{{ item.name }}</h6>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="edit-btn d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" v-on:click="openPopup(item)">Edit</button>
                                        </div>
                                    </div> 
                                </div>
                        
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" :src="item.product_img" alt="">
                                    </div>
                                    <p class="product-description"> @{{item.description }}</p>
                                    
                                </div>
                            </div>

                        </div>
                        
                    </div>

                </div> -->