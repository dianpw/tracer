<html>
	<head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login Tracer Study</title>
        <link rel = "icon" href ="public/images/logounisma.png">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
        <style>

.input-field label{color:#999;}
.input-field input[type=text]:focus + label,.input-field input[type=password]:focus + label{color:#000;}
.input-field input[type=text]:focus ,.input-field input[type=password]:focus {border-bottom:1px solid #000;box-shadow:0 1px 0 0 #000;}
.input-field input[type=text].valid,.input-field input[type=password].valid{border-bottom:1px solid #2196F3;box-shadow:0 1px 0 0 #2196F3;}
.input-field input[type=text].invalid,.input-field input[type=password].invalid{border-bottom:1px solid #F44336;box-shadow:0 1px 0 0 #F44336;}
.input-field .prefix.active{color:#000;}
/* Input : switch */
.switch{margin-top:7px;}
.switch label .lever{margin:0 7px;}

.login-body{background-image:url('https://www.transparenttextures.com/patterns/skulls.png');background-attachment:fixed;background-color: #349d44;}
.input-cart{border-radius:3px;min-height:200px;border-top:1px solid #13B916;border-bottom:5px solid #31D734;border-left:7px solid #D0F2EC;margin-top:45px;margin-bottom:0px;}
.login{margin-top:25px;border-right:1px solid #ddd;}
.policy{visibility: hidden;}
.signupForm{display: none;}
.signup{margin-top:25px;}
.signup-toggle{cursor:pointer;margin-top:140px;}
.login h4, .signup h4{font-weight:200;}
.legal{border-top:1px solid #ddd;}
.email label{margin-left:11px;}
.policy{font-size:13px;}
.main-title{font-family:pacifico;}
.msg {
    width:100%;
    border: 1px solid;
    padding:10px;
    margin: 20px;
    color: grey;
  }
  .msg-error {
    // rouge
    border-color: #d32f2f;
    background-color: #9f3533ba;
    color: white;
    margin-left:-1px;
    margin-bottom:30px;
    border-radius:5px;
    padding-left: 40px;
  }
  .msg-error{
      display: none;
  }
  .msg-error-username {
    // rouge
    border-color: #d32f2f;
    background-color: #9f3533ba;
    color: white;
    margin-left:-1px;
    margin-bottom:30px;
    border-radius:5px;
    padding-left: 40px;
  }
  .msg-error-username{
      display: none;
  }
  .indeterminate{
    display: none;
  }
  .loader {
    border-color: green;
    background-color: green;
    color: white;
    margin-left:-5px;
    margin-bottom:0px;
    border-radius:20px;
    padding-left: 40px;
  }

  .loader::before {
    content: "Login Berhasil Silakan Tunggu";
  }

  .loader::after {
    overflow: hidden;
    display: inline-block;
    vertical-align: bottom;
    -webkit-animation: ellipsis steps(4,end) 1s infinite;
    animation: ellipsis steps(4,end) 1s infinite;
    content: "\2026"; /* ascii code for the ellipsis character */
    width: 0;
    margin-right: 20px;
  }

  @keyframes ellipsis {
    to {
      width: 20px;
      margin-right: 0;
    }
  }
  .loader{
      display: none;
  }
  ::placeholder {
    color: #256e29;
    }
        </style>
		<meta charset="utf-8">
		<title>Login</title>
    </head>

	<body class="login-body">
		<div class="row" style="width: 85.667%;
        margin-top:2%;
        left: auto;
        right: auto;
        height: 85%;">

			<div class="input-cart col s12 m8 push-m2 z-depth-2 white lighten-1">
                <div class="progress" style="background-color: white">
                    <div class="indeterminate"></div>
                </div>

				<div class="col s12 m5 login">

					<h5 class="center" style="color: olivedrab;font-family: 'Yanone Kaffeesatz', sans-serif; font-size:29px"> <i class="material-icons">lock &nbsp</i>Login Area</h5>

                    <b><div class="loader"></div></b>  <br>
                        <div class="msg msg-error z-depth-6 scale-transition" style="padding-right: 12px">
                            Username / Password Salah !!
                        </div>
                		<div class="msg msg-error-username z-depth-6 scale-transition" style="padding-right: 12px">
                            Isi Username terlebih dahulu !!
                        </div>

						<div class="row">
							<div class="input-field" style="color: grey">
								<input type="text" id="user" name="username" id="username" class="validate" required="required" placeholder="Username">
                <label for="user">
                  <i class="material-icons" style="margin-top: -28px;">perm_identity</i>                </label>
							</div>
						</div>
						<div class="row">
							<div class="input-field">
								<input type="password" id="pass" name="password" class="validate form-password" required="required" placeholder="Password">
								<label for="pass">
                <i class="material-icons" style="margin-top: -28px;">lock_outline</i>
                </label>
                            </div>


                        </div>
                        <div style="margin-top:-25px">
                            <input type="checkbox" id="check" class="filled-in form-checkbox">
                            <label for="check" style="font-family:  sans-serif;font-size:15px">Show password</label>
                          </div>
                          <br>


						<div class="row">
							<div class="switch col s6">

                            </div>

							<div class="col s6">
								<button type="button" name="login" id="SubmitLogin" class="btn waves-effect waves-light green right">Login</button>
							</div>
						</div>

				</div>
				<!-- Signup form -->
				<div class="col s12 m7 signup" style="margin-top: -30px;">
				<div class="signupForm">
					<h4 class="center">Sign up</h4>
					<br>
					<form action="regCheck.php" name="signup" method="post" autocomplete="off">
						<div class="row">
							<div class="input-field col s12 m6">
								<input type="text" id="name-picked" name="namepicked" class="validate" required="required" placeholder="Enter a username">
								<label for="name-picked">
                       <i class="material-icons">person_add</i>
                </label>
							</div>
							<div class="input-field col s12 m6">
								<input type="password" id="pass-picked" name="passpicked" class="validate " required="required" placeholder="Password">
								<label for="pass-picked">
                  <i class="material-icons">lock</i>                    </label>
							</div>
						</div>
						<div class="row">
							<div class="input-field email">
								<div class="col s12">
									<input type="text" id="email" name="email" class="validate" required="required" placeholder="Enter your email">
									<label for="email">
                    <i class="material-icons">mail</i>
                  </label>
								</div>
							</div>
						</div>
                    </form>

					<div class="row">
						<button type="submit" name="btn-signup" class="btn blue right waves-effect waves-light">Sign Up</button>
					</div>
					</div>
					<div class="signup-toggle center" style="margin-top: 70px">
                        <img src="{{url('public/images/logounisma.png')}}" width="40%">
                        <h4 class="center" style="color:green">Sistem Informasi</h4>
                        <h5 class="center">Tracer Study<small style="color: grey">  v.1.0</small></h5>
                        <p class="center grey-text" style="font-size: 16px;">Published By : <a href="http://unisma.ac.id/" class="main-title green-text" target="_blank">Universitas Islam Malang</a></p>
					</div>
				</div>
				<div class="col s12">
					<br>


				</div>
			</div>
		</div>

	</body>
</html>
{{--  <script src="assets/vendors/jquery/dist/jquery.js" type="text/javascript"></script>  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

jQuery(document).ready(function($){
    $('.loader').hide();
    $('.msg-error').hide();
 	$('.msg-error-username').hide();
    $('.indeterminate').hide();
    $('.form-checkbox').click(function(){
        if($(this).is(':checked')){
            $('.form-password').attr('type','text');
        }else{
            $('.form-password').attr('type','password');
        }
    });

    $('#SubmitLogin').click(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('post-login')}}",
            method: 'post',
            data: {
                username: $('#user').val(),
                password: $('#pass').val(),

            },
            success: function(result) {
                if($('#user').val() == ''){
                	setTimeout(function(){
                        $('.msg-error-username').show();
                     }, 1000);
                }
                else if(result.errors) {

                    $('.indeterminate').show();
                	$('.msg-error-username').hide();
                    setTimeout(function(){
                        $('.msg-error').show();
                     }, 1000);
                    setTimeout(function(){
                        $('.indeterminate').hide();
                     }, 1000);

                } else if(result.success){
                    $('.loader').show();
                    $('.msg-error').hide();
                	$('.msg-error-username').hide();
                    $('.indeterminate').show();
                    setTimeout(function(){

                        window.location.href = "{{url('dashboard')}}";
                        $('.indeterminate').hide();
                     }, 2000);


                }
            }
        });
    });

    $("#pass").keyup(function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("SubmitLogin").click();
        }
    });

});


</script>
