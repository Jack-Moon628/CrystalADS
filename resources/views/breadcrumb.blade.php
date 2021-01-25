<div class="container mt-5">
	<div class="row">
		<nav aria-label="breadcrumb" class="w-100">
			<ol class="breadcrumb bg-white">
				<li class="breadcrumb-item"><a href="/home">Dashboard</a></li>

				@if(View::hasSection('crumb-parent'))
					<li class="breadcrumb-item">
						<a href="@yield('crumb-parent-url')">@yield('crumb-parent')</a>
					</li>
				@endif

				<li class="breadcrumb-item">
					<a href="{{ Request::url() }}">@yield('crumb')</a>
				</li>
			</ol>
		</nav>
	</div>
</div>