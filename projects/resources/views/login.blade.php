<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="It is a school management system (school portal) it has 4 modules Admin,parent,teacher and student">
    <meta name="author" content="Faryam Asif">
    <meta name="keyword" content="School management system (school portal) it has 4 modules Admin,parent,teacher and student">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>User Login</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
<![endif]-->
</head>

<body class="login-img3-body">

    <div class="container">
       
      <form class="login-form" >
          {!! csrf_field() !!}        
          <div class="login-wrap">
             <p class="login-img ">  <i class="fa fa-graduation-cap" aria-hidden="true"></i></p>
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <span id="sucess"></span>
            
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" name="username"  id="username" placeholder="Username" autofocus>
          </div>
          <div class="input-group">
            <span class="input-group-addon"><i class="icon_key_alt"></i></span>
            <input type="password" class="form-control" name="password"  id="password" placeholder="Password">
        </div>    
    </label>
    <button class="btn btn-primary btn-lg btn-block" id="sub" >Login</button>

</div>
</form>

    </div>


</body>
<script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
<script type="text/javascript">
    $("form").submit(function(e){
        e.preventDefault();
    });
    $('#sub').click(function(event) {
        var username=$('#username').val();
        var password=$('#password').val();
        $.post("{{ route('login') }}", {username:username,password:password,'_token':$('input[name=_token]').val()}, function(data, textStatus, xhr) {
            console.log(data);
            if(data=="false")
            {
               $("#sucess").fadeIn();
               $('#sucess').html('<div class="alert alert-block alert-danger fade in"><strong>Oh snap!!</strong> Incorrect Username or Password.</div>');
               $("#sucess").fadeOut(5000);
               scrollTo(0,0);
           }
           else
           {
               window.location.reload(true);
           }
       });


    });



</script>


</html>
