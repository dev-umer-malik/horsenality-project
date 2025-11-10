
<div class="page_banner">
	@if(Auth::check())
    	<span class="pill-button welcome nohover">Welcome {{Auth::user()->name??''}}!</span>
    	<span class="pill-button log-out" onclick="document.querySelector('.logout-form').submit()">
			Log Out?
    	</span>
	@else
		<span class="pill-button login">Login</span>
	@endif
</div>
<header>
	<nav role='navigation'>
		<ul>
			<li><a href="#" onClick="event.preventDefault(); loadPage('dashboard')">My Horsenality</a></li>
			<li><a href="#" onClick="event.preventDefault(); loadPage('riders')">My Riders</a></li>
			<li><a href="#" onClick="event.preventDefault(); loadPage('horses')">My Horses</a></li>
			<li id="horse-logo">@php echo file_get_contents(asset('assets/img/parelli_logo.svg')); @endphp</li>
			<li><a href="#" onClick="event.preventDefault(); loadPage('account')">My Profile</a></li>
			{{-- <li><a href="https://members.parelli.com/" target="_blank">Savvy Club</a></li> --}}
			<li><a href="https://shopus.parelli.com/" target="_blank">Shop Parelli</a></li>
		</ul>
	</nav>

    <!-- Mobile Navigation Menu -->
    <div class="header-nav_mobile-wrapper">
        <a href="#" id="horse-logo" onClick="event.preventDefault(); loadPage('dashboard')"><img src="{{asset('assets/img/parelli_logo.svg')}}"
                class="horse-logo"></a>
        <a href="javascript:void(0);" class="mobile_toggle">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <div class="mobile_nav">
        <div id="mobile_nav_links">
            <a href="#" onclick="event.preventDefault(); loadPage('dashboard')">My Horsenality</a>
            <a href="#" onclick="event.preventDefault(); loadPage('riders')">My Riders</a>
            <a href="#" onclick="event.preventDefault(); loadPage('horses')">My Horses</a>
            <a href="#" onclick="event.preventDefault(); loadPage('account')">My Profile</a>
            <a href="https://members.parelli.com/dashboard" target="_blank">Savvy Club</a>
            <a href="https://shopus.parelli.com/" target="_blank">Shop Parelli</a>
        </div>
    </div>

</header>

@if(Auth::user()->role->role_id == 1)
<div class="admin-potato" onClick="event.preventDefault(); loadPage('potato')"><img src="assets/img/icons/potato.png"></img></div>
@endif

<form action="{{route('logout')}}" method="post" class="logout-form">
	@csrf
</form>
