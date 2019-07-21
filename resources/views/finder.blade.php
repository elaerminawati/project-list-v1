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
                <a href="/finder?repo={{ $repo }}&path={{ $parent }}"><h3 class="glyphicon glyphicon-arrow-left"></h3></a>			
		</header>
		<div class="panel-body" style="over-flow:auto;max-height:450px;">
            <ul class="list-group">
                @foreach($items as $item)
                    <li class="list-group-item">
                        @if(isset($item['type']) && $item['type'] == 'file')
                            <a href="/edit?repo={{ $repo }}&path={{ $item['path'] }}">{{ $item['name'] }}</a>
                            <span class="badge">F</span>
                        @else
                            <a href="/finder?repo={{ $repo }}&path={{ $item['path'] }}">{{ $item['name'] }}</a>
                            <span class="badge">D</span>
                        @endif
                    </li>
                @endforeach
            </ul>
		</div>
	</section>
</div>
@endsection
@section('master-action')
<style>
    .list-group-item>.badge {
        float: left;
        margin-right: 10px;
    }
</style>
@endsection