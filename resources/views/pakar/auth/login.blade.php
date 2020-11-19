<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Gentelella Alela! | </title>
    
    <!-- Bootstrap -->
    <link href="{{asset('assets/pakar/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('assets/pakar/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('assets/pakar/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('assets/pakar/vendors/animate.css/animate.min.css')}}" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="{{asset('assets/pakar/build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
        
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    @if(session('msg'))
                    <div class="alert alert-danger alert-dismissible fade show text-left" role="alert">
                        {!!session('msg')!!}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <form method="POST" action="{{route('login')}}" class="needs-validation" novalidate>
                        @csrf
                        <h1>LOGIN</h1>
                        <div>
                            <input type="text" class="form-control mb-0" name="username" placeholder="Username" required="" />
                            <div class="invalid-feedback">
                                Username tidak boleh kosong!
                            </div>
                        </div>
                        <div>
                            <input type="password" class="form-control mt-3 mb-0" name="password" placeholder="Password" required="" />
                            <div class="invalid-feedback">
                                Password tidak boleh kosong!
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-default submit mt-3" type="submit">Log in</button>
                            <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
                        </div>
                        
                        <div class="clearfix"></div>
                        
                        <div class="separator">
                            
                            <br />
                            
                            <div>
                                <h1><img src="{{asset('assets/pakar/images/skin-icon.webp')}}" width="50" alt="pakar"> Sistem Pakar Dermatitis!</h1>
                                <p>
                                    SISTEM PAKAR DIAGNOSA PENYAKIT DERMATITIS DENGAN METODE CERTAINTY FACTOR<br>  
                                    IT~Politeknik Negeri Ambon <br> ©2020</p>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function () {
                'use strict';
                window.addEventListener('load', function () {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function (form) {
                        form.addEventListener('submit', function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
    </body>
    </html>
    