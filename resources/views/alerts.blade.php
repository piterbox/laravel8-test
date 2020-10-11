@if ($message = session()->has('error'))
	<div class="alert alert-danger alert-block">
		<div class="container">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<strong>{{ $message }}</strong>
		</div>
	</div>
@endif

@if ($message = session()->get('success'))
	<div class="alert alert-success alert-block">
		<div class="container">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{ $message }}</strong>
		</div>
	</div>
@endif


