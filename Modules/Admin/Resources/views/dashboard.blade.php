@extends('admin::layouts.master')
@section('page_specific_css')
    <link href="{{ getPublicFiles('css/style.css')}}" rel="stylesheet">
@endsection
@section('page_specific_scripts')

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
    <div id="wrapper">

        @include('admin::common.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            @include('admin::common.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="javascript:void(0)" v-on:click="openPopup()"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50"></i>
                            Add Product
                        </a>
                    </div>


                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-6 mb-4" v-for="item in list" v-if="list.length > 0">

                            <!-- Illustrations -->
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
                                    <!-- <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a> -->
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 alert alert-danger">
                            No Product found.
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            @include('admin::layouts.footer')

        </div>
        <!-- End of Content Wrapper -->
        <!-- Product Modal-->
        <div class="modal fade" id="add-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <span v-if="product.id">Edit Product</span>
                            <span v-else>Add Product</span>
                        </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                        <input type="text" class="form-control" id="name" placeholder="Product Name" v-model="product.name">
                        </div>

                        <div class="form-group">
                        <input type="number" class="form-control" id="price" placeholder="Product Price" v-model="product.price">
                        </div>

                        <div class="form-group">
                        <textarea class="form-control" id="description" placeholder="Description" v-model="product.description"></textarea>
                        </div>

                        <div class="form-group" v-if="product.product_img && !isUpdloadingNew">
                            <img  class="popup-image" :src="product.product_img" v-on:click="removeImgAtt(product)"/>
                            <p class="note"><small>Click on image to upload a new image</small></p>
                        </div>

                        <div class="form-group" v-else>
                            <input type="file" class="form-control" id="file" v-on:change="handleImage($event)">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="button" v-on:click="saveProduct()">Save</button>
                    </div>
                </div>
            </div>
        </div>
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
