<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</head>
<body>

	<section id="intro" class="intro-section">
        <div class="container">
	    	<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-login">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-6">
									<a href="#" class="active" id="case-form-link">Case</a>
								</div>
								<div class="col-xs-6">
									<a href="#" id="search-form-link">Search</a>
								</div>
							</div>
							<hr>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<form id="case-form" action="http://phpoll.com/login/process" method="post" role="form" style="display: block;">
										<div class="form-group">
											<input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Name" value="">
										</div>
										<div class="form-group">
											<input type="email" name="email" id="email" tabindex="2" class="form-control" placeholder="Email">
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 col-sm-offset-3">
													<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Create">
												</div>
											</div>
										</div>
									</form>
									<form id="search-form" action="http://phpoll.com/register/process" method="post" role="form" style="display: none;">
										<div class="form-group">
											<input type="text" name="id" id="caseid" tabindex="1" class="form-control" placeholder="Case ID" value="">
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 col-sm-offset-3">
													<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Search">
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>

    <script>

    	$(function() {

		    $('#case-form-link').click(function(e) {
				$("#case-form").delay(100).fadeIn(100);
		 		$("#search-form").fadeOut(100);
				$('#search-form-link').removeClass('active');
				$(this).addClass('active');
				e.preventDefault();
			});
			$('#search-form-link').click(function(e) {
				$("#search-form").delay(100).fadeIn(100);
		 		$("#case-form").fadeOut(100);
				$('#case-form-link').removeClass('active');
				$(this).addClass('active');
				e.preventDefault();
			});

		});

    </script>
	
	
</body>
</html>
