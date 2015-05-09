@extends('default')

@section('content')
	<section id="intro" class="intro-section photo">
        <div class="container">
	    	<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-login">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-12">
									<h5>Add User Photo</h5>
								</div>
							</div>
							<hr>
						</div>
						<div class="panel-body">
							<div class="row">
						        @if(Session::has('success'))
						          <div class="alert-box success">
						          	<h2>{!! Session::get('success') !!}</h2>
						          </div>
						        @endif
						        <form action="{{ route('upload.photo',[$id]) }}" method="post" enctype="multipart/form-data">
							        <div class="form-group">
						          		<input type="file" name="image" class="form-control" id="image">
							  			<p class="errors">{!!$errors->first('image')!!}</p>
										@if(Session::has('error'))
											<p class="errors">{!! Session::get('error') !!}</p>
								 		@endif
							        </div>
							        <div class="form-group">
											<div class="row">
												<div class="col-sm-6 col-sm-offset-3">
													<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Upload">
												</div>
											</div>
									</div>			
						      	</form>
					       </div>
					    </div> 
			    </div>
	    	</div>
	    </div>
	</section>    	
@endsection