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
		<div class="panel-body">
        <ol class="breadcrumb">
        <li><a href="{{ $file['download_url'] }}" target="_blank">Download</a></li>
        <li><a href="{{ $file['html_url'] }}" target="_blank">View file</a></li>
    </ol>

    {!! Form::open(['url' => '/update', 'method' => 'POST']) !!}
        <input name="path" value="{{ $path }}" type="hidden"/>
        <input name="repo" value="{{ $repo }}" type="hidden"/>
        <div class="form-group">
            <label for="content">File content:</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ $content }}</textarea>
        </div>

        <div class="form-group">
            <label for="commit">Commit message:</label>
            <input class="form-control" type="text" id="commit" name="commit" value="{{ $commitMessage }}"/>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-control" value="Submit" />
        </div>
    {!! Form::close() !!}
		</div>
	</section>
</div>
@endsection
@section('master-action')
@endsection
