<div class="fixed-sidebar-left">
	<ul class="nav navbar-nav side-nav nicescroll-bar">
		<li>

			<a class="active" href="{{url('/admin/dashboard')}}">Dashboard</a>

		</li>
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr"><i class="icon-basket-loaded mr-10"></i>Special Fields<span class="pull-right"><i class="fa fa-fw fa-angle-down"></i></span></a>
			<ul id="ecom_dr" class="collapse collapse-level-1">
				<li>
					<a href="{{route('specialist.index')}}">Specialists</a>
				</li>
				<li>
					<a href="{{route('specialist.create')}}">Add New</a>
				</li>

			</ul>
		</li>
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dr"><i class="icon-grid mr-10"></i>Attendee <span class="pull-right"><span class="label label-info mr-10">9</span><i class="fa fa-fw fa-angle-down"></i></span></a>
			<ul id="app_dr" class="collapse collapse-level-1">
				<li>
					<a href="{{route('attendee.index')}}">Attendees</a>
				</li>
				<li>
					<a href="{{route('attendee.create')}}">Create New</a>
				</li>
			</ul>
		</li>

		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_appoi"><i class="icon-grid mr-10"></i>Appointments <span class="pull-right"><span class="label label-info mr-10">9</span><i class="fa fa-fw fa-angle-down"></i></span></a>
			<ul id="app_appoi" class="collapse collapse-level-1">
				<li>
					<a href="{{route('appointment.index')}}">All Appointments</a>
				</li>
				<li>
					<a href="{{route('appointment.create')}}">Add New</a>
				</li>

			</ul>
		</li>
		<li>
			<a href="javascript:void(0);" data-toggle="collapse" data-target="#app_dept"><i class="icon-grid mr-10"></i>Departments <span class="pull-right"><span class="label label-info mr-10">9</span><i class="fa fa-fw fa-angle-down"></i></span></a>
			<ul id="app_dept" class="collapse collapse-level-1">
				<li>
					<a href="{{route('department.index')}}">All Departments</a>
				</li>
				<li>
					<a href="{{route('department.create')}}">Add New</a>
				</li>

			</ul>
		</li>


	</ul>
</div>