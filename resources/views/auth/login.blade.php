@extends('layouts.app')

@section('content')
<!-- <div class="bg-overlay"></div> -->
<!-- <div class="section"> -->
<!-- 	<div class="container"> -->
<!-- 		<div class="row justify-content-center"> -->
<!-- 			<div class="login-wrap"> -->
<!-- 				<h3 class="text-center">Welcome to Parelli Horsenality</h3> -->

<!-- 				<form name="loginform" id="loginform" -->
<!-- 					action="" method="post"> -->
<!-- 					<p class="login-username"> -->
<!-- 						<label for="user_login">Username</label> <input type="text" -->
<!-- 							name="log" id="user_login" class="input" value="" size="20"> -->
<!-- 					</p> -->
<!-- 					<p class="login-password"> -->
<!-- 						<label for="user_pass">Password</label> <input type="password" -->
<!-- 							name="pwd" id="user_pass" class="input" value="" size="20"> -->
<!-- 					</p> -->
<!-- 					<p class="login-remember"> -->
<!-- 						<label><input name="rememberme" type="checkbox" id="rememberme" -->
<!-- 							value="forever" checked="checked"> Remember Me</label> -->
<!-- 					</p> -->
<!-- 					<p class="login-submit"> -->
<!-- 						<input type="submit" name="wp-submit" id="wp-submit" -->
<!-- 							class="button button-primary" value="Log In"> <input -->
<!-- 							type="hidden" name="redirect_to" -->
<!-- 							value="http://localhost/horse/horsenality/"> -->
<!-- 					</p> -->
<!-- 				</form> -->
<!-- 			</div> -->
<!-- 		</div> -->
<!-- 	</div> -->
<!-- </div>  -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
					<div class="horsenality-logo"><img src="{{ asset('assets/img/Horsenality_logo2.png') }}"></div>
					
					<div class="login-welcome-box">
                        <h2>Welcome to Parelli Horsenality&reg;!</h2>
                        <p style="font-weight: bold;">If you have already purchased a Horsenality&reg; test, log in below to manage your account and access your tests.</p>
                        <p style="font-weight: bold;">If you would like more info, or to purchase a test, please <a target="_blank" href="https://shopus.parelli.com/collections/horsenality">visit the Parelli Store</a> now!</p>
                        
                        <h2>What is Horsenality&reg;?</h2>
                        <p>
                            <strong>Horsenality&reg;</strong> is the term that Pat Parelli coined to refer to understanding horses through their basic personality types.<br><br>
                            A combination of the words "horse" and "personality," <strong>Horsenality&reg;</strong> is a convenient way to talk about horse behavior in conjunction with the <strong>Parelli Natural Horsemanship</strong> method.<br><br>
                            One of the goals of the Parelli program is to help horse owners understand their horse's individual personality and to educate people about how to teach their horses in the ways that are most effective for each personality type.<br><br>
    						The <strong>Horsenality&reg;</strong> system helps students quickly identify a horse's innate character. Students can then create instant rapport and achieve great results by knowing what's uniquely important to that individual horse.<br><br>
    						This approach to understanding horses helps horses -- and their owners -- become more balanced, centered and confident.
                        </p>
                    </div>
					
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
								<br><br>
								<div>
    								Don't have an account?<br>
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                        Signup Here
                                    </a>
								</div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
