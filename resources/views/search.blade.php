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
									<h5>User Photo</h5>
								</div>
							</div>
							<hr>
						</div>
						<div class="panel-body">
							@if(empty($case->photo_url))
								<div class="row">
							        @if(Session::has('success'))
							          <div class="alert-box success">
							          	<h2>{!! Session::get('success') !!}</h2>
							          </div>
							        @endif
							        <form action="{{ route('upload.photo',[$id]) }}" method="post" enctype="multipart/form-data">
							        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
								        <div class="form-group">
							          		<input type="file" name="photo" class="form-control" id="image">
								  			<p class="errors">{!!$errors->first('photo')!!}</p>
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
						  @else 
						  	<div class="row">
						  		<div class="profile-header-container">   
						    		<div class="profile-header-img">
						                <img class="img-circle" src="/photo/{{$id}}" />
						                <div class="rank-label-container">
						                    <span class="label label-default rank-label">100 matches</span>
						                </div>
						            </div>
						        </div> 
						  	</div>
						  @endif  
			    </div>
	    	</div>
	    </div>
	</section>    	
@endsection