{{-- Menu --}}
<div id="menu" class="menu">	
	<div class="static-group">
		<a class="menu-item" href="#" onclick="toggleMenu()">
			<span class="item-icon">
				<i class="fas fa-arrow-left"></i>
			</span>

			<span class="item-title">Hide Menu</span>
		</a>

		<div class="group-title">
			<span class="title-content">Quick Action</span>
		</div>

		<a class="menu-item" href="/dashboard">
			<span class="item-icon">
				<i class="fas fa-home"></i>
			</span>

			<span class="item-title">Dashboard</span>
		</a>

		<a class="menu-item" href="/support">
			<span class="item-icon">
				<i class="fas fa-question-circle"></i>
			</span>

			<span class="item-title">Customer Support</span>
		</a>
	</div>

	<div class="group">
		@isset($menuItems)
			<div class="group-title">
				<span class="title-content">{{ Auth::user()->accountType->name }} Navigation</span>
			</div>

			@foreach($menuItems as $item)
				<a class="menu-item" href="{{ $item->action }}">
					<span class="item-icon">
						{!! $item->icon !!}
					</span>

					<span class="item-title">{{ $item->name }}</span>
				</a>
			@endforeach
		@endisset
	</div>

	<div class="group">
		<div class="group-title">
			<span class="title-content">Documentation</span>
		</div>

		<a class="menu-item" href="/help">
			<span class="item-icon">
				<i class="fas fa-database"></i>
			</span>

			<span class="item-title">Help</span>
		</a>

		<a class="menu-item" href="/help/articles/1">
			<span class="item-icon">
				<i class="fas fa-info-circle"></i>
			</span>

			<span class="item-title">Privacy Policy</span>
		</a>

		<a class="menu-item" href="/help/articles/2">
			<span class="item-icon">
				<i class="fas fa-info-circle"></i>
			</span>

			<span class="item-title">Terms of Use</span>
		</a>
	</div>
</div>

{{-- Navigation Bar --}}
<div class="container-fluid">
	<div class="row navbar">
		<div class="col-md-3">
			<button class="toggle-button ripple" onclick="toggleMenu()">
				<i id="menuIcon" class="fas fa-bars"></i>
			</button>

			<a href="/" class="text-link">CryptalADS</a>

			<span id="loadSpinner" class="d-none ml-4">
				<i class="fas fa-sync fa-spin"></i>
			</span>
		</div>

		<div class="quick-bar">
			<button id="bellAnimation" class="toggle-button ripple mr-1" onclick="bellAnimation()">
				<i class="fas fa-bell"></i>
			</button>

			<div id="walletButton" class="button-wrapper">
				<button class="toggle-button ripple mr-1">
					<i class="fas fa-wallet"></i>
				</button>

				<div class="dropdown">
					<a class="link menu-item" href="/account/wallet">
						<span class="text-primary">
							<i class="fas fa-dollar-sign"></i>
							{{ $wallet->value }}
						</span>

						<span class="float-right mr-2">
							<i class="fas fa-arrow-circle-right"></i>
						</span>
					</a>
				</div>
			</div>

			<button class="toggle-button ripple mr-1" onclick="redirect('account/settings')">
					<i class="fas fa-cog"></i>
			</button>

			<a href="/logout" class="text-link logout-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				<i class="fas fa-sign-out-alt"></i>
			</a>
		</div>
	</div>
</div>

<form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
	{{ csrf_field() }}
</form>

@include('breadcrumb')