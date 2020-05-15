<!-- start -->
<?php
  session_start();
 ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign Up</title>
	<link rel="stylesheet" href="css/signup.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">

	<!-- font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<script>
		function animationFunction() {
			$(".formular").fadeOut(2000);
				$(".picture-fitness").animate({width: "100%"});
				setTimeout(()=>{
					window.location.href = "SemesterGruppe.html";
				}, 2000);
		}
	</script>
</head>

<body>
	<main>
		<div class="container-wrapper">
			<!-- billede til venstre -->
			<div class="picture-fitness">
				<img src="img/signupPicture.svg" alt="">
			</div>
			<!-- alt til højre -->
			<div class="formular-wrapper">
				<!-- headeren (sign up, log in knap, '+' luk) -->
				<div class="formular-header">
					<h1 class="logIn h1-notActive">Log In</h1>
					<a href="signup.php"><h1 class="signUp h1-active" style="text-decoration: none;">Sign up</h1></a>
					<a href="SemesterGruppe.html"><img src="img/close.png" alt=""></a>
				</div>
				<!-- log in / sign up formular -->
				<div class="formular">
					<!-- log in -->
					<div class="logIn-container">
						<form action="includes/login.inc.php" method="post">
							<table class="logIn-formular">
								<tr>
									<td>
										<label>username or email</label>
										<input type="text" name="mail" placeholder="Username/E-mail...">
									</td>
									<td>
										<label>password</label>
										<input type="password" name="pwd" placeholder="Password">
									</td>
								</tr>
							</table>
							<!-- footer registrer bruger -->
							<div class="logIn-footer">
								<button type="submit" name="login-submit"><h3>Login</h3></button>
								<!-- <img src="img/forward.svg" alt="no image"> -->
							</div>
						</form>
					</div>

					<!-- sign up -->
					<div class="signUp-container">
						<form action="includes/signup.inc.php" method="post">
							<table class="signUp-formular">
								<tr>
									<td>
										<label>name</label>
										<input class="text-input" type="text" name="name" placeholder="Name">
									</td>
									<td>
										<label>username</label>
										<input class="text-input" type="text" name="uid" placeholder="Username">
									</td>
								</tr>
								<tr>
									<td>
										<label>email</label>
										<input class="text-input" type="text" name="mail" placeholder="E-mail">
									</td>
									<td>
										<label>primary gym</label>
										<input class="text-input" type="text" name="gym" placeholder="drop-down here">
										<!--
										<select name="gym" class="chosen" style="width: 90%;">
											<option>Sats Nyborgvej</option>
											<option>Go2Fitness</option>
											<option>Fitness World</option>
										</select>
										-->
									</td>
								</tr>
								<tr>
									<td>
										<label>password</label>
										<input class="text-input" type="password" name="pwd" placeholder="Enter your password here">
									</td>
									<td>
										<label>Repeat password</label>
										<input type="password" name="pwd-repeat" placeholder="Repeat your password">
									</td>
								</tr>
								<tr>
									<td>
										<label>Training goal</label>
										<input class="text-input" type="text" name="goal" placeholder="What is your primary goal?">
									</td>
								</tr>
							</table>
							<!-- footer registrer bruger -->
							<div class="signUp-footer">
								<button type="submit" name="signup-submit"><h3>Click here when you are done</h3></button>
								<!-- <img src="img/forward.svg" alt="no image"> -->
							</div>
						</form>
						<?php
							error_reporting(0);

							if(isset($_GET['error'])) {
								if ($_GET['error'] == 'emptyfields') {
									echo '<p>Fill in all fields</p>';
								}
								else if ($_GET['error'] == 'invalidmailuid') {
									echo '<p>Invalid username and e-mail</p>';
								}
								else if ($_GET['error'] == 'invaliduid') {
									echo '<p>Invalid username</p>';
								}
								else if ($_GET['error'] == 'invalidmail') {
									echo '<p>Invalid e-mail</p>';
								}
								else if ($_GET['error'] == 'passwordcheck') {
									echo '<p>Your passwords does not match</p>';
								}
								else if ($_GET['error'] == 'usertaken') {
									echo '<p>Username is already taken</p>';
								}
							}
							else if ($_GET['signup'] == 'success') {
							echo '<p>Signup successfull!</p>',
								'<script type="text/javascript">',
								'animationFunction();',
								'</script>';
							}
							else if ($_GET['login'] == 'success') {
								echo '<p>Login successfull!</p>',
									'<script type="text/javascript">',
									'animationFunction();',
									'</script>';
								}
								?>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script>
		$(()=> {
			/*
			$(".chosen").chosen({ width: '100%' });
			var chosenValue = $(".chosen").val();
			console.log(chosenValue);
			$( 'select.chosen' ).on( 'change', function() {
				console.log( $( this ).val() );
			} );
			*/

			$(".signUp").click(()=>{
				$(".logIn-container").css("display", "none");
				$(".signUp-container").css("display", "inline-block");
				$(".logIn").removeClass("h1-active").addClass("h1-notActive");
				$(".signUp").removeClass("h1-notActive").addClass("h1-active");
			})

			$(".logIn").click(()=>{
				$(".signUp-container").css("display", "none");
				$(".logIn-container").css("display", "inline-block");
				$(".signUp").removeClass("h1-active").addClass("h1-notActive");
				$(".logIn").removeClass("h1-notActive").addClass("h1-active");
			})



			/*
			$(".signUp").click(()=>{
				$(".formular").fadeOut();
				$(".picture-fitness").animate({width: "100%"});
				setTimeout(()=>{
					window.location.href = "SemesterGruppe.html";
				}, 1000);
			})
			*/
		});
	</script>
</body>
</html>
