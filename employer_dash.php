<?php
   include('php/session.php');
?>

<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Employer Dashboard </title>
		<link rel = "stylesheet" type = "text/css" href = "bootstrap.min.css">
		<link rel = "stylesheet" type = "text/css" href = "stylesheet.css">
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	
	<body>
		<div id="page">
		
			<header id="header">
				<div id="logo">
					<h1><a href="employer_dash.php">TAAS<span>IT</span></a></h1>
				</div>
				<div id="top-nav">
					<ul>
					<li><a href="employer_dash.php">Home</a></li>
					<li><a href="php/logout.php">Logout</a></li>
					<li><a href="#">Help</a></li>
					</ul>
				</div>
				<div class="clr"></div>
			</header>
			
			<div id="feature">
				<h1>Welcome, <?php echo $first_name . " (" . $login_session . ")"; ?></h1>
			</div>
			
			<div id = "content">
				<div id = "content-inner">
					<nav id = "sidebar">
						<div class = "widget">
							<h2>Dashboard</h2>
							<ul>
								<li><input type = "button" value = "Video Feed" onclick = "openVideoFeed()" class = "btn btn-default"></li>
								<li><input type = "button" value = "Create Account" class = "btn btn-default" data-toggle = "modal" data-target = "#createAccountModal"></li>
								<li><input type = "button" value = "Account Search" class = "btn btn-default" data-toggle = "modal" data-target = "#accountSearchModal"></li>
							</ul>
						</div>
					</nav>
				</div>
				<div class="clr"></div>
			</div>
			
			<footer id="footer">
				<p>&copy; Copyright <a href="#">Your Site</a> &#124; <a href="#">Terms of Use</a> &#124; <a href="#">Privacy Policy</a></p>
				<div class="clr"></div>
			</footer>
			
		</div>
		
		<!-- Create new account modal -->
		<div id = "createAccountModal" class = "modal fade" role = "dialog">
			<div class = "modal-dialog">
				<div class = "modal-content">
					<div class = "modal-header">
						<button type = "button" class = "close" data-dismiss = "modal">&times;</button>
						<h2 class = "modal-title">Create New Account</h2>
					</div>
					<div class = "modal-body">
						<!-- Submit form -->
						<form id = "createAccountForm" class = "form-horizontal" method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role = "form">
							<div style = "padding: 0px 30px 0px 30px;">
								<!-- First name -->
								<div class = "form-group">
									<label for = "firstName">First Name</label>
									<input type = "text" class = "form-control" id = "firstName" name = "firstName" required/>
								</div>
								<!-- Last name -->
								<div class = "form-group">
									<label for = "lastName">Last Name</label>
									<input type = "text" class = "form-control" id = "lastName" name = "lastName" requried/>
								</div>
								<!-- Street address -->
								<div class = "form-group">
									<label for = "streetAddress">Street Address</label>
									<input type = "text" class = "form-control" id = "streetAddress" name = "streetAddress" required/>
								</div>
								<!-- Zip Code -->
								<div class = "form-group">
									<label for = "zipCode">Zip Code</label>
									<input type = "text" class = "form-control" id = "zipCode" name = "zipCode" required/>
								</div>
								<!-- State -->
								<div class = "form-group">
									<label for = "state">State</label>
									<input type = "text" class = "form-control" id = "state" name = "state" required/>
								</div>
								<!-- Phone Number -->
								<div class = "form-group">
									<label for = "phoneNum">Phone Number</label>
									<input type = "text" class = "form-control" id = "phoneNum" name = "phoneNum" requried/>
								</div>
								<!-- Employee ID -->
								<div class = "form-group">
									<label for = "employeeId">Employee ID</label>
									<input type = "text" class = "form-control" id = "employeeId" name = "employeeId" required/>
								</div>
								<!-- Password -->
								<div class = "form-group">
									<label for = "password">Password</label>
									<input type = "password" class = "form-control" id = "password" name = "password" required/>
								</div>
								<!-- Submit button -->
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn btn-default">Submit</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class = "modal-footer">
					<button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Account creation status modal -->
		<div id = "createAccountStatusModal" class = "modal fade" role = "dialog">
			<div class = "modal-dialog">
				<div class = "modal-content">
					<div class = "modal-header">
						<button type = "button" class = "close" data-dismiss = "modal">&times;</button>
						<h2 class= "modal-title">Account Creation Status</h2>
					</div>
					<div class = "modal-body">
						<h3><p id = "createAccountStatusMessage"></p></h3>
					</div>
					<div class = "modal-footer">
						<button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Account search modal -->
		<div id = "accountSearchModal" class = "modal fade" role = "dialog">
			<div class = "modal-dialog">
				<div class = "modal-content">
					<div class = "modal-header">
						<button type = "button" class = "close" data-dismiss = "modal">&times;</button>
						<h2 class= "modal-title">Employee Account Search</h2>
					</div>
					<div class = "modal-body">
					
						<!-- Account search form -->
						<form id = "searchAccountForm" class = "form-horizontal" method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role = "form">
							<div style = "padding: 0px 30px 0px 30px;">
								<!-- Employee ID -->
								<div class = "form-group">
									<label for = "employeeId">Employee ID to search: </label>
									<input type = "text" class = "form-control" id = "employeeId" name = "employeeId" required/>
								</div>
								<!-- Submit button -->
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" class="btn btn-default">Search</button>
									</div>
								</div>
							</div>
						</form>
						
					</div>
					<div class = "modal-footer">
						<button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Javascript -->
		<script>
			var VIDEO_FEED = ["http://192.168.1.165:8082"];
			
			$("#createAccountForm").submit(function(e) {
				$.ajax({
					type: "POST",
					url: "php/create_account.php",
					data: $(this).serialize(),
					success: function(data) {
						console.log("Test Success");
						document.getElementById("createAccountStatusMessage").append(data);
						$("#createAccountModal").modal('hide');
						$("#createAccountStatusModal").modal('show');
					},
					failure: function(result) {
						console.log("Test Failure");
					}
				});
				
				e.preventDefault();
			});
		
			function openVideoFeed() {
				console.log("test");
				window.open(VIDEO_FEED[0], "newwindow", "width = 640, height = 400, left = 300, top = 300");
			}
		</script>

	</body>
</html>