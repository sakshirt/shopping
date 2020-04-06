@extends('admin::frontend.layouts.master')

@section('page_specific_scripts')

	<script src="{{ getPublicFiles('frontend/js/responsiveslides.min.js')}}"></script>
	<script>
		$(function () {
			$("#slider4").responsiveSlides({
				auto: true,
				pager: true,
				nav: true,
				speed: 1000,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});
		});
	</script>
	<!-- js for portfolio lightbox -->
	

@endsection
@section('content')

    <!-- Page Wrapper -->
    <div id="wrapper" class="frontend-wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
   
            <!-- Main Content -->
            <div id="content">    
                
            @include('admin::frontend.common.hometopbar')
    
                <!-- /girds_bottom-->
                <div class="grids_bottom">
                        <div class="style-grids">
                            <div class="col-md-6 style-grid style-grid-1">
                                <img src="{{ getPublicFiles('frontend/images/b1.jpg')}}" alt="shoe">
                            </div>
                        </div>
                        <div class="col-md-6 style-grid style-grid-2">
                            <div class="style-image-1_info">
                                <div class="style-grid-2-text_info">
                                    <h3>Nike DOWNSHIFTER</h3>
                                    <p>Itaque earum rerum hic tenetur a sapiente delectus reiciendis maiores alias consequatur.sed quia non numquam eius modi
                                        tempora incidunt ut labore et dolore .</p>
                                    <div class="shop-button">
                                        <a href="{{ url('/shop') }}">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="style-image-2">
                                <img src="{{ getPublicFiles('frontend/images/b2.jpg')}}" alt="shoe">
                                <div class="style-grid-2-text">
                                    <h3>Air force</h3>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->


    </div>
    <!-- End of Page Wrapper -->

@endsection