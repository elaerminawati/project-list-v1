@extends('master-auth.app')
@section('content')
<section class="body-sign">
			<div class="center-sign">
				<a href="{{ route('login') }}" class="logo pull-left">
					<img src="{{ asset('assets/images/new_logo.png') }} " height="54" alt="Porto Admin" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign Up</h2>
					</div>
					<div class="panel-body">
						<form method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
							<div class="form-group mb-lg">
								<label>Name</label>
								<input name="name" type="text" class="form-control input-lg" required/>
							</div>

							<div class="form-group mb-lg">
								<label>E-mail Github</label>
                                <input name="email" type="email" class="form-control input-lg" required/>
                                @if($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red;">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>

							<div class="form-group mb-none">
								<div class="row">
									<div class="col-sm-6 mb-lg">
										<label>Password</label>
										<input name="password" type="password" class="form-control input-lg" required/>
                                    </div>
									<div class="col-sm-6 mb-lg">
										<label>Password Confirmation</label>
										<input name="password_confirmation" type="password" class="form-control input-lg" required/>
                                    </div>
                                    @if($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color:red;">{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="AgreeTerms" name="agreeterms" type="checkbox"/>
										<label for="AgreeTerms">I agree with <a href="#">terms of use</a></label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs">Sign Up</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign Up</button>
								</div>
							</div>
							<p>Already have an account? <a href="{{ route('login') }}">Sign In!</a>

						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
			</div>
		</section>
		<!-- end: page -->
@endsection
