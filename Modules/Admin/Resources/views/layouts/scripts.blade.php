<!-- Bootstrap core JavaScript-->
<script src="{{ getPublicFiles('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ getPublicFiles('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ getPublicFiles('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ getPublicFiles('js/sb-admin-2.min.js') }}"></script>

<!-- Vue JS-->
<script src="{{ getPublicFiles('js/common/vue.min.js') }}"></script>

<!-- Vue resources JS-->
<script src="{{ getPublicFiles('js/common/vue-resource.min.js') }}"></script>

<!-- Vue pagination JS-->
<script src="{{ getPublicFiles('js/common/VuePagination.js') }}"></script>

<script src="{{ getPublicFiles('js/common/Extendable.js') }}"></script>
@yield('page_specific_scripts')