<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Login Administrator | Medion </title>

  <!-- Bootstrap -->
  <link href="{{URL::asset('assets/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{URL::asset('assets/gentelella/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{URL::asset('assets/gentelella/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
  <!-- Animate.css -->
  <link href="{{URL::asset('assets/gentelella/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="{{URL::asset('assets/gentelella/build/css/custom.min.css')}}" rel="stylesheet">
</head>
<style type="text/css">

#spinner {
  background: #FFFFFF;
  filter:alpha(opacity=60); /* IE */
  -moz-opacity:0.5; /* Mozilla */
  opacity: 0.5; /* CSS3 */
  position: fixed; height: 100%;
  width:100%;
  text-align:center;
  overflow: auto;
  z-index:1234;

}

.img_loader {

  position: absolute;
  margin: auto;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;

}
</style>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>
    <div id="spinner" style="display:none;">
      <img class="img_loader" src="assets/loader2.gif" alt="Loading" />
    </div>
    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form action="{{ url('/login') }}" method="POST" id="form_login" role="form">
            {{ csrf_field() }}
            <h1>Login Admin</h1>
            <div>
              <input type="text" name="email" class="form-control" placeholder="Email" required="" id="email" />
              {{ $errors->first('email') }}
            </div>
            <div>
              <input type="password" name="password" class="form-control" placeholder="Password" required="" id="password" />
            </div>
            <div>
              <button type="submit" class="btn btn-info" id="submit">Log in</a>
              </div>

            </form>
            <div class="clearfix"></div>

            <div class="separator">


              <div class="clearfix"></div>
              <br />

              <div>
                {{-- <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1> --}}
                <p>©{{date('Y')}} All Rights Reserved. PT. Medion Farma Jaya</p>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </body>
  <script src="assets/js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript">
  if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
  </script>
  <script type="text/javascript">
  $(document).ready(function(){
    $("#spinner").bind("ajaxSend", function() {
      $(this).show();
    }).bind("ajaxStop", function() {
      $(this).hide();
    }).bind("ajaxError", function() {
      $(this).hide();
    });

    $('#submit').click(function() {
      $('#spinner').show();
    });

  });
  </script>
  </html>
