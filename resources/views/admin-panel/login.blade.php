<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Login</title>

<link rel="stylesheet" href="{{ asset('admin-assets/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('admin-assets/assets/vendors/toastr/css/toastr.min.css') }}">

    <style>
        body,html{
        width:100%;
        height: 100%;
        }
        body{
        margin:0;
        padding:0;
        background:linear-gradient(100deg, rgba(8,85,88,1) 0%, rgba(69,19,165,1) 94%, rgba(10,51,164,1) 100%, rgba(83,23,191,0.9654236694677871) 100%);;
        }
        .bubbles{
        position:absolute;
        width:100%;
        height: 100%;
        z-index:0;
        overflow:hidden;
        top:0;
        left:0;
        }
        .bubble{
        position: absolute;
        bottom:-100px;
        width:40px;
        height: 40px;
        background:#f1f1f1;
        border-radius:50%;
        opacity:0.5;
        animation: rise 10s infinite ease-in;
        }
        .bubble:nth-child(1){
        width:40px;
        height:40px;
        left:10%;
        animation-duration:8s;
        }
        .bubble:nth-child(2){
        width:20px;
        height:20px;
        left:20%;
        animation-duration:5s;
        animation-delay:1s;
        }
        .bubble:nth-child(3){
        width:50px;
        height:50px;
        left:35%;
        animation-duration:7s;
        animation-delay:2s;
        }
        .bubble:nth-child(4){
        width:80px;
        height:80px;
        left:50%;
        animation-duration:11s;
        animation-delay:0s;
        }
        .bubble:nth-child(5){
        width:35px;
        height:35px;
        left:55%;
        animation-duration:6s;
        animation-delay:1s;
        }
        .bubble:nth-child(6){
        width:45px;
        height:45px;
        left:65%;
        animation-duration:8s;
        animation-delay:3s;
        }
        .bubble:nth-child(7){
        width:90px;
        height:90px;
        left:70%;
        animation-duration:12s;
        animation-delay:2s;
        }
        .bubble:nth-child(8){
        width:25px;
        height:25px;
        left:80%;
        animation-duration:6s;
        animation-delay:2s;
        }
        .bubble:nth-child(9){
        width:15px;
        height:15px;
        left:70%;
        animation-duration:5s;
        animation-delay:1s;
        }
        .bubble:nth-child(10){
        width:90px;
        height:90px;
        left:25%;
        animation-duration:10s;
        animation-delay:4s;
        }
        .content-wrapper {
            background: none;
        }
        @keyframes rise{
        0%{
            bottom:-100px;
            transform:translateX(0);
        }
        50%{
            transform:translate(100px);
        }
        100%{
            bottom:1080px;
            transform:translateX(-200px);
        }
        }
    </style>

</head>

<body class="h-100">


    <section class="sticky">
        <div class="bubbles">
            <div class="bubble"></div>
          <div class="bubble"></div>
          <div class="bubble"></div>
          <div class="bubble"></div>
          <div class="bubble"></div>
          <div class="bubble"></div>
          <div class="bubble"></div>
          <div class="bubble"></div>
          <div class="bubble"></div>
          <div class="bubble"></div>

        </div>
    </section>



    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="row w-100 m-0">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
              <div class="card col-lg-4 mx-auto">
                <div class="card-body px-5 py-5">
                  <h3 class="card-title text-left mb-3">Login</h3>
                  {{ Form::open(array('route' => 'admin.login.submit', 'method'=> "post")) }}
                        <div class="form-group">
                            {{ Form::label('email', 'E-Mail Address') }}
                            {{ Form::text('email', null,['class' => 'form-control', 'placeholder'=>"email", 'required']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('password', 'Password') }}
                            {{ Form::password('password', ['class' => 'form-control', 'required']) }}
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between">
                            <div class="">
                                <a href="#" class="forgot-pass">Home Page</a>
                            </div>
                            <a href="#" class="forgot-pass">Forgot password</a>
                          </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                        </div>
                    {{ Form::close() }}
                </div>
              </div>
            </div>
            <!-- content-wrapper ends -->
          </div>
          <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>


    @include('admin-panel.partial.js')
    @include('admin-panel.partial._message')
    @include('admin-panel.partial.error-message')


</body>

</html>
