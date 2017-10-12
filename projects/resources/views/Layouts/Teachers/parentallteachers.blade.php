@extends('Layouts.Dashboard.parentdashboard')


@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3 class="page-header"><i class="fa fa-group"></i> ALL TEACHERS</h3>
		<ol class="breadcrumb">
			<li><i class="fa fa-home"></i><a href="{{ route('parentdashboard') }}">Home</a></li>
			<li><i class="fa fa-group"></i>TEACHERS</li>
			<li><i class="fa fa-group"></i>ALL TEACHERS</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12" >
		<section class="panel">
			<span id="sucess"></span>
			<header class="panel-heading">
				REGISTERED TEACHERS
			</header>
			<div id="re">
				<table class="table table-striped table-advance table-hover" id="rows">
					<tbody>
						<tr>
							<th><i class="icon_profile"></i> ID</th>
							<th><i class="icon_profile"></i> NAME</th>
							<th><i class="icon_profile"></i> SEX</th>
							<th><i class="icon_profile"></i> DATE OF BIRTH</th>
							<th><i class="icon_mail_alt"></i> EMAIL</th>
							<th><i class="fa fa-phone"></i> PHONE NUMBER</th>
							<th><i class="icon_profile"></i> ADDRESS</th>
						</tr>
						@foreach ($teachers as $teacher)
						<tr>
							<td >{{$teacher->teacher_id}}</td>
							<td>{{$teacher->teacher_first_name}} {{$teacher->teacher_last_name}}</td>
							<td> @if ($teacher->teacher_sex=="1") MALE @else FEMALE @endif</td>
							<td>{{$teacher->teacher_dob}}</td>
							<td>{{$teacher->user->email}}</td>
							<td>{{$teacher->teacher_phone_number}}</td>
							<td>{{$teacher->teacher_address}}</td>

					</tr>
					@endforeach                 
				</tbody>
			</table>
		</div>
	</section>
</div>
</div>



@endsection
