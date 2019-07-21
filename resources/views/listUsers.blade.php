@extends('master-app.master-app')
@section('header-breadcrumbs')
<h2>Users</h2>
	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="{{ route('list-users')}}">
					<i class="fa fa-users"></i>
				</a>
			</li>
			<li><span>Users</span></li>
		</ol>
		<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
	</div>
@endsection
@section('master-content')
<div class="col-md-12">
	<section class="panel">
		<header class="panel-heading">
            <h2 class="panel-title">List Users</h2>
			<p class="panel-subtitle">This is list users</p>
		</header>
		<div class="panel-body responsive-table">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
			<thead>
				<tr>
					<th>#</th>
                    <th>Name</th>
                    <th>Email</th>
					<th>GITHUB</th>
					<th>Role</th>
				</tr>
			</thead>
			<tbody>
                <?php $no = 1; ?>
                @foreach($datalistusers as $datalistusers)
				<tr class="gradeX">
                    <td>{{ $no }}</td>
                    <td>{{ $datalistusers->name }}</td>
                    <td>{{ $datalistusers->email }}</td>
					<td>{{ $datalistusers->git_link }}
					</td>
					<td>{{ $datalistusers->role }}</td>
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