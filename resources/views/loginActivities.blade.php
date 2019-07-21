@extends('master-app.master-app')
@section('header-breadcrumbs')
<h2>LOGIN ACTIVITIES</h2>
	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="{{ route('login-activities')}}">
					<i class="fa fa-users"></i>
				</a>
			</li>
			<li><span>LOGIN ACTIVITIES</span></li>
		</ol>
		<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
	</div>
@endsection
@section('master-content')
<div class="col-md-12">
	<section class="panel">
		<header class="panel-heading">
            <h2 class="panel-title">LOGIN ACTIVITIES</h2>
			<p class="panel-subtitle">This is list login activities user</p>
		</header>
		<div class="panel-body responsive-table">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
			<thead>
				<tr>
					<th>#</th>
                    <th>User</th>
                    <th>IP Address</th>
					<th>Platform(s)</th>
					<th>Browser App</th>
					<th>Brownser Version</th>
				</tr>
			</thead>
			<tbody>
                <?php $no = 1; ?>
                @foreach($dataloginactivities as $dataloginactivities)
				<tr class="gradeX">
                    <td>{{ $no }}</td>
                    <td>{{ $dataloginactivities->name }}</td>
                    <td>{{ $dataloginactivities->ip_address }}</td>
					<td>{{ $dataloginactivities->platform_type.", ".$dataloginactivities->platform_name." ".$dataloginactivities->platform_version }}
					</td>
					<td>{{ $dataloginactivities->browser_name }}</td>
					<td >{{ $dataloginactivities->browser_version}}</td>
                    <?php $no++; ?>
                @endforeach
				</tr>
			</tbody>
		</table>
		</div>
	</section>
</div>
@endsection
@section('master-action')
        <script src="{{ asset('assets/vendor/select2/select2.js') }}"></script>
        <script src="{{ asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js') }}"></script>
		<script src="{{ asset('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js') }}"></script>
		<script src="{{ asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js') }}"></script>


		<!-- Examples -->
		<script src="{{ asset('assets/javascripts/tables/examples.datatables.default.js') }}"></script>
		<script src="{{ asset('assets/javascripts/tables/examples.datatables.row.with.details.js') }}"></script>
		<script src="{{ asset('assets/javascripts/tables/examples.datatables.tabletools.js') }}"></script>
@endsection