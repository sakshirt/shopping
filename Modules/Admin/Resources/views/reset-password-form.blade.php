@extends('admin::layouts.master')
@section('page_specific_scripts')
    <script src="{{ getPublicFiles('js/modules/admin/reset-password-form.js') }}"></script>
@endsection
@section('content')

    <div id="app" class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Reset Your Password</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                        <input  v-model="user.password" type="password" class="form-control form-control-user" id="password" aria-describedby="emailHelp" placeholder="Enter password...">
                                        </div>
                                    
                                        <div class="form-group">
                                        <input  v-model="user.confirm_password" type="password" class="form-control form-control-user" id="confirm_password" aria-describedby="emailHelp" placeholder="Enter password for confirmation...">
                                        </div>
                                        <button v-on:click="resetPassword($event)" class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('admin.register') }}">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('admin.login') }}">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
