<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>

<head>
    <title>Quản lý admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <style>
        .login_google {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: red;
            line-height: 40px;
        }

        .login_facebook {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: blue;
            line-height: 40px;
        }
    </style>
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->

    <link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css" />
    <link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">
    <!-- //font-awesome icons -->
    <script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
</head>

<body>
    <div class="log-w3">
        <div class="w3layouts-main">
            <h2>Đăng nhập</h2>
            <?php
            //Lấy message
            $message = Session::get('message');

            if ($message) {
                echo '<span class="text-alert">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>
            <form action="{{URL::to('/admin-dashboard')}}" method="post">
                {{csrf_field()}}
                @foreach ($errors -> all() as $error)
                <ul>
                    <li>
                        {{$error}}
                    </li>
                </ul>
                @endforeach

                <!-- tạo file input value -->
                <input type="text" class="ggg" name="admin_email" placeholder="Điền email" required="">
                <input type="password" class="ggg" name="admin_password" placeholder="Điền PASSWORD" required="">
                <span><input type="checkbox" />Nhớ đăng nhập</span>
                <h6><a href="#">Quên mật khẩu</a></h6>
                <div class="clearfix"></div>
                <input type="submit" value="Đăng nhập" name="login">
                <!-- Captcha -->
                <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                <br />
                @if($errors->has('g-recaptcha-response'))
                <span class="invalid-feedback" style="display:none">
                    <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                </span>
                @endif
                <!-- end Captcha -->
            </form>
            <p>Bạn đã có tài khoản chưa?<a href="registration.html">Tạo tài khoản</a></p>
            <a href="{{URL::to('/login-facebook')}}" class="login_facebook"><i class="fab fa-facebook-f"></i>Facebook</a>
            <a href="{{URL::to('/login-google')}}" class="login_google"><i class="fab fa-google"></i>Google</a>
        </div>
    </div>
    <script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('public/backend/js/scripts.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>