@extends('layouts.app')
@include('includes.navbar')

<script>
window.addEventListener('load', function () {
	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	const redirect = urlParams.get('redirect')
	const args = urlParams.get('args')
	
	if(redirect) {
		if(args) {
			loadPage(redirect, args);
		} else {
			loadPage(redirect);
		}
	} else {
		loadPage('dashboard');
	}
})
</script>