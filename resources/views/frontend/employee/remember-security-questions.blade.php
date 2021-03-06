<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Intell-Comm Employee Remember Security Question</title>
  <link rel="stylesheet" type="text/css" href="{{asset('frontpages/html/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('frontpages/html/css/style.css')}}">

  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
  <style type="text/css">
    .main{
      background: url()no-repeat;
     
    }
    .login-form h1 {
      background:#d2b481;
      color: #fff;
    }
   
    .learn_more_btn .btn {
    background: #776d5a;
     }
    .help-block{
       margin-left: -33px;
     }

  </style>
</head>

<body>
  <div class="main">
   <div class="wrapper">

    <div class="header">
      <div class="top_header">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <ul class="pull-right">
                @if(Auth::check() && Auth::user()->role_id == 4)
                <li><img src="{{asset('frontpages/html/images/user_icon.png')}}">
                 {{Auth::user()->name}} 
                     <a href="{{url('employee-logout')}}" style="text-decoration: none;color:green">(Logout)</a> /  
                     <a href="{{url('employee/dashboard')}}" style="text-decoration: none;color:green">(Dashboard)</a>
                </li>
                @else
                <li><img src="{{asset('frontpages/html/images/user_icon.png')}}"><a href="{{url('employee-login')}}" style="text-decoration: none;">Employee Login</a></li>
                @endif

                @if(Auth::check() && Auth::user()->role_id == 5)
                <li style="color:#ff7800"><img src="{{asset('frontpages/html/images/user_icon.png')}}">{{Auth::user()->name}} 
                     <a href="{{url('other-party-logout')}}" style="text-decoration: none;color:green">(Logout)</a> /  
                     <a href="{{url('other-party/dashboard')}}" style="text-decoration: none;color:green">(Dashboard)</a>
                </li>
                @else
                 <li><img src="{{asset('frontpages/html/images/user_icon.png')}}"><a href="{{url('other-party-login')}}" style="text-decoration: none;">Other Party Login</a></li>
                @endif
               
                @if(Auth::check() && Auth::user()->role_id == 3)
                <li><img src="{{asset('frontpages/html/images/registered_user.png')}}">
                {{Auth::user()->name}} 
                     <a href="{{url('client-logout')}}" style="text-decoration: none;color:green">(Logout)</a> /  
                     <a href="{{url('client/dashboard')}}" style="text-decoration: none;color:green">(Dashboard)</a>
                </li>
                @else
                <li><img src="{{asset('frontpages/html/images/registered_user.png')}}">
                <a href="{{url('client-login')}}" style="text-decoration: none;">Client Login
                </a>
                </li>
                @endif
              </ul>
           </div>
         </div>
       </div>
     </div>
     <div class="bottom_header">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 


            <nav class="navbar navbar-default">
              <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                 <a class="navbar-brand" href="http://intell-comm.com"><img src="{{asset('frontpages/html/images/logo.png')}}"></a> </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                 <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="http://intell-comm.com">HOME</a></li>
                  <li><a href="#">ABOUT US</a></li>
                  <li><a href="#">FEATURES</a></li>
                  <li><a href="#">TEAM</a></li>
                  <li><a href="#">OUR SERVICES</a></li>
                  <li><a href="#">CONTACT</a></li>
      </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="registration_section main">
   <div class="container">
    <div class="login-form">

      <div class="row">
       @if (Session::has('message'))
       <div  align="center" id="successMessage" class="alert alert-info" style="color:red">{{ Session::get('message') }}
       </div>
       @endif

       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

         <h1>Enter Your Registered Security Question</h1>

    <form class="bootstrap-modal-form" action="{{url('employee/check-security-question-answer')}}" method="post" files='true'>
    {{ csrf_field() }}
    <div class="login-form-section" style="padding: 28px;">
     <div class="form-group" align="center" style="margin-left:37px;">
        <label  name="login_error"></label>
       </div>
    <div class="form-group">
      <select id="select_security_question" name="user_security_questions" class="form-control">
            <option value="" selected>Select your registered security quetion </option>
            @foreach($security_questions as $security_question)
            <option value="{{$security_question->id}}">{{$security_question->security_question}}</option>
            @endforeach
     </select>
    </div>
    
    <div class="form-group" style='display:none;' id='security_question_answer'>
     <input type='text' class='text' placeholder="Write registered security answer" name='security_question_answer' maxlength="20" class="form-control"/>
    </div>
     <input type='hidden' name='employee_id' value="{{$employee_id}}" class="form-control"/>
    <div class="learn_more_btn">
      <button type="submit" class="btn btn-success">Submit</button>
    </div>
     <div class="learn_more_btn">
      <a href="{{url('employee-login')}}" style="color:#8a6d3b">Do you want to go login?</a>
    </div><br>
    <!-- <div class="learn_more_btn">
      <a href="#" style="color:#3c763d">If you don't remember securiry question or answer, contact your business manager</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div> -->
   </div>

    </form>
      </div>
    </div>

  </div>
</div>
</div>

@include('frontend.footer')
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('frontpages/html/js/bootstrap.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('js/login-bootstrap-modal-form.js')}}"></script>
<script>
    $(document).ready(function(){
       


        $('#select_security_question').on('change', function() {
            if (this.value == '')
            {
                $("#security_question_answer").hide();
                
            }
            else
            {
                $("#security_question_answer").show();
            }
        });

       
    });
</script>

</body>
</html>