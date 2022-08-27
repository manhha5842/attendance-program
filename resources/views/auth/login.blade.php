@include('auth.header')

<body class="loading authentication-bg" data-layout-config='{"darkMode":false}'>
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="index.html">
                                <span><img src="{{ asset('images/logo.png') }}" alt="" height="18"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Sign In</h4>
                            </div>
                            <form method="POST" action="{{ route('process_login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" type="email" name="email" id="emailaddress"
                                        required="" placeholder="Enter your email">
                                </div>
                                <div class="form-group">
                                    <a href="pages-recoverpw.html" class="text-muted float-right"><small>Forgot your
                                            password?</small></a>
                                    <label for="password">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="Enter your password">
                                        <div class="input-group-append" data-password="false">
                                            <div class="input-group-text">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin"
                                            checked>
                                        <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary" type="submit"> Log In </button>
                                </div>
                                <div class="text-center mt-4">
                                    <p class="text-muted font-16">Sign in with</p>
                                    <ul class="social-list list-inline mt-3">
                                        <li class="list-inline-item">
                                            <a href="{{ route('auth.redirect', 'google') }}"
                                                class="social-list-item border-danger text-danger"><i
                                                    class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="{{ route('auth.redirect', 'github') }}"
                                                class="social-list-item border-secondary text-secondary"><i
                                                    class="mdi mdi-github-circle"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div>

                    <!-- end card -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    @include('auth.footer')

    <!-- bundle -->
    <script src="{{ asset('js/vendor.min.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>


</body>

</html>
