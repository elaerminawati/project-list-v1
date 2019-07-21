@extends('master-auth.app')
@section('content')
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
					<img src="{{ asset('assets/images/new_logo.png') }}" height="54" alt="Porto Admin" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
					</div>
					<div class="panel-body">
						<form action="{{ route('login') }}" method="post">
						{{ csrf_field() }}
							<div class="form-group mb-lg">
								<label>Email</label>
								<div class="input-group input-group-icon">
									<input name="email" type="email" class="form-control input-lg" placeholder="Email"/>
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
								@if($errors->has('email'))
									<span class="invalid-feedback" role="alert">
										<strong style="color:red;">{{ $errors->first('email') }}</strong>
									</span>
                                @endif
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Password</label>
								</div>
								<div class="input-group input-group-icon">
									<input name="password" type="password" class="form-control input-lg" placeholder="Password"/>
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
								@if($errors->has('password'))
									<span class="invalid-feedback" role="alert">
										<strong style="color:red;">{{ $errors->first('password') }}</strong>
									</span>
                                @endif
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="RememberMe" name="rememberme" type="checkbox"/>
										<label for="RememberMe">Remember Me</label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
								</div>
							</div>

							<!-- <span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>or</span>
							</span>

							<div class="mb-xs text-center">
								<a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
								<a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
							</div> -->

							<p>Don't have an account yet? <a href="{{ route('register') }}">Sign Up!</a>

						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">&copy; Copyright 2018. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
			</div>
		</section>
		<!-- end: page -->
@endsection