@if(Session::has('flash_message'))
    <div class="alert alert-success alert-dismissible fade show" dir="{{ condition('rtl', 'ltr') }}" role="alert">
		
		<strong>{{ __('cozastore.MessageTitle') }}</strong> {{ Session::get('flash_message') }}
		
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	
	</div>
@elseif(Session::has('error_message'))
	<div class="alert alert-danger alert-dismissible fade show" dir="{{ condition('rtl', 'ltr') }}" role="alert">
		
		<strong>{{ __('cozastore.MessageTitle') }}</strong> {{ Session::get('error_message') }}
		
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	
	</div>
@endif