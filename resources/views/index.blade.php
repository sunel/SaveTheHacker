@extends('default')

@section('content')
	<section id="intro" class="intro-section">
        <div class="container">
	    	<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-login">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-6">
									<a href="#" class="active" id="case-form-link"><h4>Case</h4></a>
								</div>
								<div class="col-xs-6">
									<a href="#" id="search-form-link"><h4>Search</h4></a>
								</div>
							</div>
							<hr>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<form id="case-form" action="{{ route('case.post') }}" method="post" role="form" style="display: block;">
									    <input type="hidden" name="_token" value="{{ csrf_token() }}">
										<div class="form-group">
											<input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Name" value="">
										</div>
										<div class="form-group">
											<input type="email" name="email" id="email" tabindex="2" class="form-control" placeholder="Email">
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 col-sm-offset-3">
													<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login btn-lg btn-info" value="Create">
												</div>
											</div>
										</div>
									</form>
									<form id="search-form" action="{{ route('search.post') }}" method="get" role="form" style="display: none;">
										<div class="form-group">
											<input type="text" name="id" id="caseid" tabindex="1" class="form-control" placeholder="Case ID" value="">
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 col-sm-offset-3">
													<input type="submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Search">
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
@endsection
