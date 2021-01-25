<div class="container">
	<div class="row">
		<div class="col-md-1">
			<a href="/" class="brand">cryptalads</a>
		</div>

		<div class="col-md-10">
			<ul class="nav-items">
				<a href="/advertisers" class="item">advertisers</a>
				<a href="/publishers" class="item">publishers</a>
				<a href="/company" class="item">company</a>
				<a href="/faq" class="item">faq</a>
			</ul>
		</div>

		<div class="col-md-1">
			@guest
				<a href="/login">Sign in</a>
			@else
				<a href="/home">Dashboard</a>
			@endguest
		</div>
	</div>
</div>