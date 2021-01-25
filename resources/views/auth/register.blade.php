@extends('layouts.guest')

@section('styling')

	<link rel="stylesheet" type="text/css" href="{{ asset('css/views/guest/register.css') }}">

@endsection

@section('content')

	<div class="left-pane">
		<div class="w-100 mt-4 ml-2">
			<a href="/" class="tip p-2">
				<i class="fas fa-long-arrow-alt-left"></i>
				home
			</a>
		</div>

		<div class="feature-wrapper">
			<div class="feature-list">
				<p class="wrapper-title">cryptalads</p>

				<div class="feature">
					<div class="title">
						Anti Fraud Detection
					</div>

					<div class="description">
						<span>Our Anti Fraud algorithm prevents fake clicks, only crediting you for a real audience.</span>
					</div>
				</div>

				<div class="feature">
					<div class="title">
						Cryptocurrency Accepted Here
					</div>

					<div class="description">
						<span>Pay anonymously and securely via your crypto stream of choice. We currently accept LiteCoin.</span>
					</div>
				</div>

				<div class="feature">
					<div class="title">
						Crypto Only Traffic
					</div>

					<div class="description">
						<span>We only show adverts on crypto oriented websites, for a specialised, targetted audience.</span>
					</div>
				</div>
			</div>
		</div>

		<div class="pane-footer">
			<div class="footer-content">
				<span class="tip">© Cryptalads 2020</span>
				<a class="tip" href="/help/articles/1">Privacy Policy</a>
			</div>
		</div>

		<img src="/images/shapes/wave.svg" class="wave-shape">
	</div>

	<div class="right-pane">
		<div class="form-wrapper mb-3">
            <form method="POST" action="/register">
                @CSRF

				<p class="wrapper-title">register an account</p>

                <div class="input-item">
	                <span>Email Address</span> 
	                <input type="email" name="email" onblur="validateEmail(this);" required>

	                <span id="emailValidation" class="validation"></span>
	            </div>

	            <div class="input-item">
	                <span>Username</span> 
	                <input type="text" name="username" required>

	                <span id="usernameValidation" class="validation"></span>
	            </div>

	            <div class="input-item">
	                <span>
	                	Password

		                <span class="input-tip d-inline-block">
		                	<span>
		                		Your password must contain at least 1 uppercase, lowercase, numerical and special character, 
		                		and be at least 8 characters.
		                	</span>

							<i class="far fa-question-circle"></i>
		                </span>
	                </span>
	                <input id="password" type="password" name="password" autocomplete="new-password" onblur="validatePassword(this);" required>

	                <span id="passwordValidation" class="validation"></span>
	            </div>

	            <div class="input-item">
	                <span>Confirm Password</span>
	                <input type="password" name="password_confirmation" autocomplete="new-password" onblur="validateConfirmPassword(this);" required>

	                <span id="passwordConfirmValidation" class="validation"></span>
	            </div>

	            <div class="input-checkbox">
	            	<input id="mailList" type="checkbox" name="email_list" value="1" checked>
	            	<label for="mailList">
		            	Recieve promotional and service information by joining our mailing list.
						You can unsubscribe at any time.
		            </label>
	            </div>

                <span class="hint">
                	By creating an account, you agree to the 
                	<a href="/help/articles/2">terms and conditions</a>
                </span>

                <input type="submit" class="form-submit" value="Create Account">

                <span class="hint mt-4">
                	Already registered?
                	<a href="/login">Login instead</a>
                </span>
            </form>
        </div>
    </div>

@endsection

@section('scripts')

	<script type="text/javascript" src="/js/views/guest/register.js"></script>

	@error('email')
	    <script type="text/javascript">
	    	showValidationError("#emailValidation", "{{ $message }}");
	    </script>
	@enderror

	@error('username')
	    <script type="text/javascript">
	    	showValidationError("#usernameValidation", "{{ $message }}");
	    </script>
	@enderror

	@error('password')
	    <script type="text/javascript">
	    	showValidationError("#passwordValidation", "{{ $message }}");
	    </script>
	@enderror

@endsection