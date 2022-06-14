<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/bootstrappp.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/pages/auth.css') }}">
</head>
</head>

<body>
    <div class="justify-content-center">
        <div class="col-md-12">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <div id="auth">
                <div class="row h-100">
                    <div class="col-lg-5 col-12">
                        <div id="auth-left">
                            <div class="auth-logo">
                                <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                            </div>
                            <h1 class="auth-title">Log in Layanan.</h1>
                            <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.
                            </p>
                            <form action="/login_layanan" method="post">
                                @csrf
                                <div class="form-group position-relative has-icon-left mb-4">
                                    <input type="integer" name="nik" class="form-control form-control-xl" id="nik"
                                        placeholder="Nik" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-shield-lock"></i>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left mb-4">
                                    <input type="password" name="password" class="form-control form-control-xl"
                                        id="password" placeholder="Password" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-shield-lock"></i>
                                    </div>
                                </div>

                                <button class="w-100 btn btn-lg btn-primary">Log in</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <div id="auth-right">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
