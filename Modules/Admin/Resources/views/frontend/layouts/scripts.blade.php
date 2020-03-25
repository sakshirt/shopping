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
	
	<!-- Vue JS-->
<script src="{{ getPublicFiles('js/common/vue.min.js') }}"></script>

<!-- Vue resources JS--> 
<script src="{{ getPublicFiles('js/common/vue-resource.min.js') }}"></script>

<!-- Vue pagination JS-->
<script src="{{ getPublicFiles('js/common/VuePagination.js') }}"></script>

<!-- NProgress -->
<script src="{{ getPublicFiles('js/common/nprogress.min.js') }}"></script>
<script src="{{ getPublicFiles('js/common/Extendable.js') }}"></script>

@yield('page_specific_scripts')