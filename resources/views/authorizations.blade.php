@extends('master-app.master-app')
@section('header-breadcrumbs')
<h2>REPOSITORIES</h2>
	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="{{ route('repository') }}">
					<i class="fa fa-folder-open"></i>
				</a>
			</li>
			<li><span>Repositories</span></li>
		</ol>
		<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
	</div>
@endsection
@section('master-content')
<div class="col-md-12">
	<section class="panel">
		<header class="panel-heading">
            <h2 class="panel-title">GIT REPOSITORIES</h2>
			<p class="panel-subtitle">This is your github repositories</p>
		</header>
		<div class="panel-body" style="over-flow:auto;max-height:450px;">
            <div class="list-group">
            @foreach($authorizations as $authorization)
                <a class="list-group-item" target="_blank" href="{{ $authorization['app']['url'] }}">
                    <h4 class="list-group-item-heading">{{ $authorization['app']['name'] }}</h4>
                    <p class="list-group-item-text">{{ $authorization['app']['url'] }}</p>
                </a>
            @endforeach
            </div>
		</div>
	</section>
</div>
@endsection
@section('master-action')
@endsection