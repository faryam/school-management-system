@extends('Layouts.Dashboard.admindashboard')


@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="icon_profile"></i> PROFILE</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="{{ route('dashboard') }}">Home</a></li>
			<li><i class="icon_profile"></i>PROFILE</li>
		</ol>
	</div>
</div>
<div class="row">
	<!-- profile-widget -->
	<div class="col-lg-12">
		<div class="profile-widget profile-widget-info">
			<div class="panel-body">
				<div class="col-lg-2 col-sm-2">
					<h4>{{$user->name}}</h4>
					<h6>Admin</h6>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<span id="sucess"></span>
			<header class="panel-heading tab-bg-info">
				<ul class="nav nav-tabs">

					<li class="active"> 
						<a data-toggle="tab" href="#prof">
							<i class="icon-user"></i>
							Profile
						</a>
					</li>
					<li class="">
						<a data-toggle="tab" href="#edit-profile">
							<i class="icon-envelope"></i>
							Edit Profile
						</a>
					</li>
					<li class="">
						<a data-toggle="tab" href="#change-password">
							<i class="icon-home"></i>
							Change Password
						</a>
					</li>
				</ul>
			</header>
			<div class="panel-body">
				<div class="tab-content">

					<!-- profile -->
					<div id="prof" class="tab-pane active">
						<section class="panel">

							<div class="panel-body bio-graph-info">
								<h1>Bio Graph</h1>
								<div class="row">
									<div class="bio-row">
										<p><span>Username </span>: {{$user->name}} </p>
									</div>
									
									<div class="bio-row">
										<p><span>Email </span>:{{$user->email}}</p>
									</div>

								</div>
							</div>
						</section>
						<section>
							<div class="row">                                              
							</div>
						</section>
					</div>
					<!-- edit-profile -->
					<div id="edit-profile" class="tab-pane">
						<section class="panel">                                          
							<div class="panel-body bio-graph-info">
								<h1> Profile Info</h1>
								<form class="form-validate form-horizontal" id="register_form" method="post" action="" >
									
									<input type="hidden" id="user_id" value="{{$user->id}}">
									<div class="form-group ">
										<label for="username" class="control-label col-lg-2">Username <span class="required">*</span></label>
										<div class="col-lg-10">
											<input class="form-control " id="username" name="username" type="text" value="{{$user->name}}"/>
										</div>
									</div>
									<div class="form-group ">
										<label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
										<div class="col-lg-10">
											<input class="form-control " id="email" name="email" type="email" value="{{$user->email}}"/>
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button class="btn btn-primary" id="sub"  >SAVE</button>

										</div>
									</div>
								</form>
							</div>
						</section>
					</div>
					<div id="change-password" class="tab-pane ">
						<div class="profile-activity"> 
							<h1> Change Password</h1>                                         
							<form class="form-validate form-horizontal" id="changePassword_form" method="post" action="" >
								<input type="hidden" id="user_id" value="{{$user->id}}">
								<div class="form-group ">
									<label for="username" class="control-label col-lg-2">Old Password <span class="required">*</span></label>
									<div class="col-lg-10">
										<input class="form-control " id="old_password" name="old_password" type="password" />
									</div>
								</div>

								<div class="form-group ">
									<label for="password" class="control-label col-lg-2">New Password <span class="required">*</span></label>
									<div class="col-lg-10">
										<input class="form-control " id="password" name="password" type="password" />
									</div>
								</div>
								<div class="form-group ">
									<label for="confirm_password" class="control-label col-lg-2">Confirm Password <span class="required">*</span></label>
									<div class="col-lg-10">
										<input class="form-control " id="confirm_password" name="confirm_password" type="password" />
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-lg-offset-2 col-lg-10">
										<button class="btn btn-primary" id="sub"  >Save</button>

									</div>
								</div>
							</form>







						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>




@endsection
{{csrf_field()}}

@section('script')
<script>


	$("#changePassword_form").validate({

		submitHandler: function(form) {
			var id=$('#user_id').val();
			var old_password=$('#old_password').val();
			var password=$('#confirm_password').val();
			$.post("{{ route('adminpasswordchange') }}", {id:id,old_password:old_password,password:password,'_token':$('input[name=_token]').val()}, function(data) {
				if(data=="true")
				{
					$("#sucess").fadeIn();
					$('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Password has been Changed</div>');
					$("#sucess").fadeOut(5000);
					scrollTo(0,0);
					window.location.reload(true);
				}
				else
				{
					$('#old_password').after('<span class="text-danger"><strong>Oh snap!!</strong>Incorrect old password.</span>');
				}
				console.log(data);
			}).fail(function(xhr, textStatus, errorThrown) { 
				alert(xhr.responseText);
  //  $('#sucess').html('<div class="alert alert-block alert-danger fade in"><strong>Oh snap!!</strong> Username is already taken.</div>');
  // $('#old_password').after('<span class="text-danger"><strong>Oh snap!!</strong>Incorrect old password.</span>');
});



		}, 

		rules: {
			
			old_password: {
				required: true,
				minlength: 5
			},
			password: {
				required: true,
				minlength: 5
			},
			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			}
		},
		messages: {                
			
			old_password: {
				required: "Please enter a old password.",
				minlength: "Your password must consist of at least 5 characters long."
			},
			password: {
				required: "Please provide a password.",
				minlength: "Your password must be at least 5 characters long."
			},
			confirm_password: {
				required: "Please provide a password.",
				minlength: "Your password must be at least 5 characters long.",
				equalTo: "Please enter the same password as above."
			}
		}

	});



	$("#register_form").validate({

		submitHandler: function(form) {
			var id=$('#user_id').val();
			var name=$('#username').val();
			var email=$('#email').val();
			$.post("{{ route('updateinfoadmin') }}", {id:id,name:name,email:email,'_token':$('input[name=_token]').val()}, function(data) {
				$("#sucess").fadeIn();
				$('#sucess').html('<div class="alert alert-success fade in"><strong>Success!</strong> Admin has been Saved.</div>');
				$("#sucess").fadeOut(3000);
				scrollTo(0,0);
				window.location.reload(true);
				console.log(data);
			}).fail(function(xhr, textStatus, errorThrown) { 
				alert(xhr.responseText);
  //  $('#sucess').html('<div class="alert alert-block alert-danger fade in"><strong>Oh snap!!</strong> Username is already taken.</div>');
  $('#username').after('<span class="text-danger"><strong>Oh snap!!</strong>Username is already taken.</span>');
});



		}, 

		rules: {
			

			username: {
				required: true,
				minlength: 5
			},
			email: {
				required: true,
				email: true
			}
		},
		messages: {                
			
			username: {
				required: "Please enter a Username.",
				minlength: "Your username must consist of at least 5 characters long."
			},

			email: "Please enter a valid email address."
		}

	});

	
</script>


@endsection