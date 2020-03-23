@extends('admin::layouts.master')
@section('page_specific_css')

    <link href="{{ getPublicFiles('frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="{{ getPublicFiles('frontend/css/shop.css')}}" type="text/css" media="screen" property="" />
	<link href="{{ getPublicFiles('frontend/css/style7.css')}}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ getPublicFiles('frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome-icons -->
	<link href="{{ getPublicFiles('frontend/css/font-awesome.css')}}" rel="stylesheet">
	<!-- //font-awesome-icons -->
	<link href="//fonts.googleapis.com/css?family=Montserrat:100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">

    <link href="{{ getPublicFiles('css/style.css')}}" rel="stylesheet">
@endsection
@section('page_specific_scripts')

<script type="text/javascript" src="{{ getPublicFiles('frontend/js/jquery-2.1.4.min.js')}}"></script>
	<!-- //js -->
	<!-- /nav -->
	<script src="{{ getPublicFiles('frontend/js/modernizr-2.6.2.min.js')}}"></script>
	<script src="{{ getPublicFiles('frontend/js/classie.js')}}"></script>
	<script src="{{ getPublicFiles('frontend/js/demo1.js')}}"></script>
	<!-- //nav -->
	<!-- cart-js -->
	<script src="{{ getPublicFiles('frontend/js/minicart.js')}}"></script>
	<script>
		shoe.render();

		shoe.cart.on('shoe_checkout', function (evt) {
			var items, len, i;

			if (this.subtotal() > 0) {
				items = this.items();

				for (i = 0, len = items.length; i < len; i++) {}
			}
		});
	</script>
	<!-- //cart-js -->
	<!--search-bar-->
	<script src="{{ getPublicFiles('frontend/js/search.js')}}"></script>
	<!--//search-bar-->
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
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="{{ getPublicFiles('frontend/js/move-top.js')}}"></script>
	<script type="text/javascript" src="{{ getPublicFiles('frontend/js/easing.js')}}"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smoth-scrolling -->

	<script type="text/javascript" src="{{ getPublicFiles('frontend/js/bootstrap-3.1.1.min.js')}}"></script>

    <script type="application/x-javascript">
            addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
	</script>

    <!-- Core plugin JavaScript-->
    <script src="{{ getPublicFiles('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ getPublicFiles('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <!-- <script src="{{ getPublicFiles('vendor/chart.js/Chart.min.js') }}"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="{{ getPublicFiles('js/demo/chart-area-demo.js') }}"></script> -->
    <!-- <script src="{{ getPublicFiles('js/demo/chart-pie-demo.js') }}"></script> -->
    <script src="{{ getPublicFiles('js/modules/admin/dashboard.js') }}"></script>
@endsection
@section('content')

    <!-- Page Wrapper -->
    <div id="wrapper" class="frontend-wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
   
            <!-- Main Content -->
            <div id="content">    
                
            @include('admin::common.topbar')
    
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
        
        @include('admin::common.footer')

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
@endsection