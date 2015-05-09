@extends('default')

@section('content')
	<section id="intro" class="intro-section">
        <div class="container">
	    	<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-login">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-12">
									<h4>Add User Photo</h4>
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
							         <div class="control-group">
							          	<div class="controls">
							          		<input type="file" name="image" id="image">
								  			<p class="errors">{!!$errors->first('image')!!}</p>
											@if(Session::has('error'))
												<p class="errors">{!! Session::get('error') !!}</p>
									 		@endif
							        	</div>
							        </div>
				    				<input type="submit" value="Upload Image" name="submit">
						      	</form>
					       </div>
					    </div> 
			    </div>
	    	</div>
	    </div>
	</section>    	
@endsection