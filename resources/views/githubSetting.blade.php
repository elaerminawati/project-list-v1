@extends('master-app.master-app')
@section('header-breadcrumbs')
<h2>GITHUB SETTING</h2>
	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
			<li>
				<a href="{{ route('github-setting')}}">
					<i class="fa fa-gears"></i>
				</a>
			</li>
			<li><span>GITHUB</span></li>
		</ol>
		<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
	</div>
@endsection
@section('master-content')
<div class="col-md-12">
	<section class="panel">
		<header class="panel-heading">
            <h2 class="panel-title">GITHUB FORM</h2>
			<p class="panel-subtitle">Please complete this form to access your GITHUB repository</p>
		</header>
		<div class="panel-body">
            <!-- GIT EMAIL -->
            <div class="form-group">
			<label class="col-md-3 control-label" for="textareaDefault">GIT EMAIL</label>
			    <div class="col-md-6">
                    <input class="form-control" type="email" name="gitemail" value="{{ $gitdata->git_email }}" id="gitemail" data-plugin-maxlength maxlength="100" required />
				</div>
			</div>
            <!-- GIT LINK -->
            <div class="form-group">
			<label class="col-md-3 control-label" for="textareaDefault">GIT LINK</label>
			    <div class="col-md-6">
                    <input class="form-control" type="text" name="gitlink" value="{{ $gitdata->git_link }}" id="gitlink" data-plugin-maxlength maxlength="255" required />
				</div>
			</div>
            <!-- GIT PASSWORD -->
            <div class="form-group">
			<label class="col-md-3 control-label" for="textareaDefault">GIT PASSWORD</label>
			    <div class="col-md-6">
                    <input class="form-control" type="password" name="gitpassword" value="{{ Crypt::decryptString($gitdata->git_password) }}" id="gitpassword" required />
                </div>
			</div>
            <!-- GIT TOKEN -->
            <div class="form-group">
			<label class="col-md-3 control-label" for="textareaDefault">GIT TOKEN</label>
			    <div class="col-md-6">
                    <input class="form-control" type="text" name="gittoken" id="gittoken" value="{{ Crypt::decryptString($gitdata->git_token) }}"  data-plugin-maxlength maxlength="255" required />
				</div>
			</div>
            <!-- GIT STATUS -->
            <div class="form-group">
			<label class="col-md-3 control-label" for="textareaDefault">GIT STATUS</label>
			    <div class="col-md-6">
                    <select class="form-control" name="gitstatus" id="gitstatus" required>
                        @if($gitdata->git_status == 1)
                        <option value="">Choose</option>
						<option value="1" selected>SHOW REPO</option>
                        <option value="0">HIDE REPO</option>
                        @elseif($gitdata->git_status == 0)
                        <option value="">Choose</option>
						<option value="1" >SHOW REPO</option>
                        <option value="0" selected>HIDE REPO</option>
                        @else
                        <option value="" selected>Choose</option>
						<option value="1" >SHOW REPO</option>
                        <option value="0">HIDE REPO</option>
                        @endif
					</select>
				</div>
            </div>
            <!-- Button -->
            <div class="form-group">
			<label class="col-md-3 control-label" for="textareaDefault"></label>
			    <div class="col-md-6">
                <button type="button" id="save_project_list" class="mb-xs mt-xs mr-xs btn btn-primary btn-block">SAVE</button>
				</div>
            </div>
		</div>
	</section>
</div>
@endsection
@section('master-action')
<script>
    $(document).on('click', '#save_project_list', function(e){
        e.preventDefault();
        var git_email = $("#gitemail").val();
        var git_link = $("#gitlink").val();
        var git_password = $("#gitpassword").val();
        var git_token = $("#gittoken").val();
        var git_status = $("#gitstatus").val();
        if(git_email !== "" && git_link !== "" && git_password !== "" && git_token !== "" && git_status !== "" ){
            $.ajax({
                url : "{{ route('SaveGithubSetting') }}",
                type : "POST",
                dataType : "JSON",
                data:{
                    '_token' : "{{ csrf_token() }}",
                    'git_email' : git_email,
                    'git_link' : git_link,
                    'git_password' : git_password,
                    'git_token' : git_token,
                    'git_status' : git_status
                }, success : function(data){
                    console.log(data);
                    alert("Success");
                    location.reload();
                }, error : function(thrownError){
                    console.log(thrownError);
                }
            })
        }
    });
</script>
@endsection