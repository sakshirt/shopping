@extends('admin::frontend.layouts.master')
@section('page_specific_css')
    <link href="{{ getPublicFiles('frontend/css/flexslider.css')}}" rel="stylesheet">
    <link href="{{ getPublicFiles('frontend/css/easy-responsive-tabs.css')}}" rel="stylesheet">
    <link href="{{ getPublicFiles('frontend/css/jquery-ui1.css')}}" rel="stylesheet">
@endsection
@section('page_specific_scripts')
   
    <script type="text/javascript" src="{{ getPublicFiles('frontend/js/easy-responsive-tabs.js')}}"></script>
    <script type="text/javascript" src="{{ getPublicFiles('frontend/js/imagezoom.js')}}"></script>
    
	<script>
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#tabInfo');
					var $name = $('span', $info);
					$name.text($tab.text());
					$info.show();
				}
			});
			$('#verticalTab').easyResponsiveTabs({
				type: 'vertical',
				width: 'auto',
				fit: true
			});
		});
    </script>
    
    <script type="text/javascript" src="{{ getPublicFiles('frontend/js/jquery.flexslider.js')}}"></script>

	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
    <!-- //FlexSlider-->
    
    <script src="{{ getPublicFiles('frontend/js/product.js')}}"></script>
    
@endsection
@section('content')
<div id="wrapper" class="frontend-wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
   
            <!-- Main Content -->
            <div id="content">    
        
    @include('admin::frontend.common.header')

	<!-- top Products -->
	<div class="ads-grid_shop" v-if="list">
		<div class="shop_inner_inf">
			<div class="col-md-4 single-right-left ">
				<div class="grid images_3_of_2">
					<div class="flexslider">
                    
						<ul class="slides">
							<li data-thumb="{{ getPublicFiles('frontend/images/d2.jpg')}}">
								<div class="thumb-image"> <img src="{{ getPublicFiles('frontend/images/d2.jpg')}}" data-imagezoom="true" class="img-responsive"> </div>
							</li>
							<li data-thumb="{{ getPublicFiles('frontend/images/d1.jpg')}}">
								<div class="thumb-image"> <img src="{{ getPublicFiles('frontend/images/d1.jpg')}}" data-imagezoom="true" class="img-responsive"> </div>
							</li>
							<li data-thumb="{{ getPublicFiles('frontend/images/d3.jpg')}}">
								<div class="thumb-image"> <img src="{{ getPublicFiles('frontend/images/d3.jpg')}}" data-imagezoom="true" class="img-responsive"> </div>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-8 single-right-left simpleCart_shelfItem">
				<h3>@{{ list.name }}</h3>
				<p><span class="item_price">@{{ list.price }}</span>
				</p>
				<!-- <div class="rating1">
					<ul class="stars">
						<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
					</ul>
				</div> -->
				<!-- <div class="description">
					<h5>Check delivery, payment options and charges at your location</h5>
					<form action="#" method="post">
						<input type="text" value="Enter pincode" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter pincode';}"
						    required="">
						<input type="submit" value="Check">
					</form>
				</div> -->
				<!-- <div class="color-quality">
					<div class="color-quality-right">
						<h5>Quantity :</h5>
						<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
								<option value="null">5 Qty</option>
								<option value="null">6 Qty</option> 
								<option value="null">7 Qty</option>					
								<option value="null">10 Qty</option>								
							</select>
					</div>
				</div> -->
				<!-- <div class="occasional">
					<h5>Types :</h5>
					<div class="colr ert">
						<label class="radio"><input type="radio" name="radio" checked=""><i></i>Casual Shoes</label>
					</div>
					<div class="colr">
						<label class="radio"><input type="radio" name="radio"><i></i>Sneakers </label>
					</div>
					<div class="colr">
						<label class="radio"><input type="radio" name="radio"><i></i>Formal Shoes</label>
					</div>
					<div class="clearfix"> </div>
                </div> -->
                
                        <!--/tab_one-->
                        
                        
							<div class="single_page">
								<h6>Description</h6>
								<p class="para">@{{ list.description }}</p>
                            </div>
                            
                        
				<div class="occasion-cart">
					<div class="shoe single-item single_page_b">
						<form action="#" method="post">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="add" value="1">
							<input type="hidden" name="shoe_item" value="Chikku Loafers">
							<input type="hidden" name="amount" value="405.00">
							<input type="submit" name="submit" value="Add to cart" class="button add">

							<a href="#" data-toggle="modal" data-target="#myModal1"></a>
						</form>

					</div>

				</div>
				<!-- <ul class="social-nav model-3d-0 footer-social social single_page">
					<li class="share">Share On : </li>
					<li>
						<a href="#" class="facebook">
							<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="#" class="twitter">
							<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="#" class="instagram">
							<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="#" class="pinterest">
							<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
						</a>
					</li>
				</ul> -->

			</div>
			<div class="clearfix"> </div>
			<!--/tabs-->
			<!-- <div class="responsive_tabs">
				<div id="horizontalTab">
					<ul class="resp-tabs-list">
						<li>Description</li> -->
						<!-- <li>Reviews</li> -->
						<!-- <li>Information</li> -->
					<!-- </ul>
					<div class="resp-tabs-container"> -->
						<!--/tab_one-->
						<!-- <div class="tab1">

							<div class="single_page">
								<h6>Lorem ipsum dolor sit amet</h6>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie
									blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt
									ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore
									magna aliqua.</p>
								<p class="para">Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie
									blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt
									ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore
									magna aliqua.</p>
							</div>
						</div> -->
						<!--//tab_one-->
						<!-- <div class="tab2">

							<div class="single_page">
								<div class="bootstrap-tab-text-grids">
									<div class="bootstrap-tab-text-grid">
										<div class="bootstrap-tab-text-grid-left">
											<img src="images/t1.jpg" alt=" " class="img-responsive">
										</div>
										<div class="bootstrap-tab-text-grid-right">
											<ul>
												<li><a href="#">Admin</a></li>
												<li><a href="#"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</a></li>
											</ul>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget.Ut enim ad minima veniam,
												quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis
												autem vel eum iure reprehenderit.</p>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="add-review">
										<h4>add a review</h4>
										<form action="#" method="post">
											<input type="text" name="Name" required="Name">
											<input type="email" name="Email" required="Email">
											<textarea name="Message" required=""></textarea>
											<input type="submit" value="SEND">
										</form>
									</div>
								</div>

							</div> -->
						<!-- </div> -->
						<!-- <div class="tab3">

							<div class="single_page">
								<h6>Shoe Rock Vision(SRV) Sneakers (Blue)</h6>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie
									blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt
									ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore
									magna aliqua.</p>
								<p class="para">Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget nisl ullamcorper, molestie
									blandit ipsum auctor. Mauris volutpat augue dolor.Consectetur adipisicing elit, sed do eiusmod tempor incididunt
									ut lab ore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. labore et dolore
									magna aliqua.</p>
							</div>
						</div> -->
					<!-- </div>
				</div>
			</div> -->
			<!--//tabs-->


		</div>
	</div>
	<!-- //top products -->

    <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    </div>
    </div>
</div>

@endsection

