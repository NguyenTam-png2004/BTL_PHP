

<head>
  
  <link rel="stylesheet" href="client/assets/css/style_login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<div class="container" id="container">
	<div class="row">
	<div class="form-container sign-up-container">
		<!-- đăng ký -->
		<form method="POST" action="" id="SignUp">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fa fa-google" aria-hidden="true"></i></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="hidden" name="type" value="signup">
			<input type="text" placeholder="Username" id= "username_signUp" name= "username_signUp" required/>
			<input type="email" placeholder="Email" id= "email_signUp" name= "email_signUp" required/>
			<input type="password" placeholder="Password"  id= "password_signUp" name= "password_signUp" required/>
			<button type = "submit">Sign Up</button>
			<p id="desktop_para">To keep connected with us,please login</p>
			<button class="ghost_desktop" id="signIn_desktop">Sign In</button>
		</form>
	</div>
	<!-- đăng nhập --->
	<div class="form-container sign-in-container">
		<form method="POST" action="" id='SignIn'>
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="<?php echo $authUrl; ?>" class="social"><i class="fa fa-google" aria-hidden="true"></i></a>
			</div>
			<span>or use your account</span>
			<input type="hidden" name="type" value="login">
			<input type="email" placeholder="Email" id='email_signIn' name="email_signIn" required/>
			<input type="password" placeholder="Password" id='password_signIn' name="password_signIn" required/>
			<button type = "submit">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Don't have an account? Sign up here !!</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
</div>
</body>
<script src= "client/assets/javascript/login.js"></script>
<script>
	//gửi dữ liệu người dùng nhập vào file auth.php
	const SignIn = document.getElementById("SignIn");
	const SignUp = document.getElementById("SignUp");

	function user(form, actionName) {
	const formData = new FormData(form);

	fetch(`index.php?controller=SignUser&action=${actionName}`, {
		method: 'POST',
		body: formData
	})
	.then(response => response.json())
	.then(data => {
		console.log(data);
		if(data.message){alert(data.message);}

		if (data.status === "success") {
			const redirectUrl = data.role === "1" 
				? `index.php?controller=Home&action=HomeLogin&role=${data.role}`
				: `index.php?controller=HomeAdmin&action=Home&role=${data.role}`;
			
			window.location.href = redirectUrl;
		}
	})
	.catch(error => alert(error));
	}


	SignIn.addEventListener('submit', function(e){
		e.preventDefault();
		user(SignIn,'SignIn');
	});

	SignUp.addEventListener('submit', function(e){
		e.preventDefault();
		user(SignUp,'SignUp');
	});

	</script>
</html>