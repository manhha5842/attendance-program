@include('auth2.header')

<body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="auth-brand text-center text-lg-left">
                        <a href="index.html" class="logo-dark">
                            <span><img src="{{ asset('images/logo-dark.png') }}" alt="" height="18"></span>
                        </a>
                        <a href="index.html" class="logo-light">
                            <span><img src="{{ asset('images/logo.png') }}" alt="" height="18"></span>
                        </a>
                    </div>

                    <!-- title-->
                    <h4 class="mt-0">Đăng nhập</h4>
                    <p class="text-muted mb-4">Nhập địa chỉ Email và mật khẩu để vào trang web.</p>

                    <!-- form -->
                    <form action="#">
                        <div class="form-group">
                            <label for="emailaddress">Địa chỉ Email</label>
                            <input class="form-control" type="email" id="emailaddress" required=""
                                placeholder="Nhập email của bạn">
                        </div>
                        <div class="form-group">
                            <a href="pages-recoverpw-2.html" class="text-muted float-right"><small>Quên mật
                                    khẩu?</small></a>
                            <label for="password">Mật khẩu</label>
                            <input class="form-control" type="password" required="" id="password"
                                placeholder="Nhập mật khẩu của bạn">
                        </div>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                <label class="custom-control-label" for="checkbox-signin">Ghi nhớ</label>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-login"></i>Đăng
                                nhập</button>
                        </div>
                        <!-- social-->
                        <div class="text-center mt-4">
                            <p class="text-muted font-16">Đăng nhập với</p>
                            <ul class="social-list list-inline mt-3">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                            class="mdi mdi-google"></i></a>
                                </li>
                            </ul>
                        </div>
                    </form>
                    <!-- end form-->

                    <!-- Footer-->
                    @include('auth2.footer')

                </div> <!-- end .card-body -->
            </div> <!-- end .align-items-center.d-flex.h-100-->
        </div>
        <!-- end auth-fluid-form-box-->

        <!-- Auth fluid right content -->
        <div class="auth-fluid-right text-center">
            <div class="auth-user-testimonial">
                <h2 class="mb-3">Phần mềm điểm danh sinh viên</h2>
                <p class="lead"><i class="mdi mdi-format-quote-open"></i> Đồ án cá nhân<i
                        class="mdi mdi-format-quote-close"></i>
                </p>
                <p> Nguyễn Vũ Mạnh Hà </p>
            </div> <!-- end auth-user-testimonial-->
        </div>
        <!-- end Auth fluid right content -->
    </div>
    <!-- end auth-fluid-->

    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

</body>
