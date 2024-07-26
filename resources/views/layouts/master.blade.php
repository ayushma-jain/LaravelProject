<html>
    <head>
		@include('includes.head')
    </head>
    <body>
		@if(Request::is('/'))
			<div class="content">
				@yield('content')
			</div>
	    @else
			
		@include('includes.sidebar')
		<div class="main-panel">
			@include('includes.header')

			<div class="content">
				@yield('content')
			</div>
			<input type="hidden" name="hf_base_url" id="hf_base_url" value="{{ url('/') }}">
		   @include('includes.footer')
		</div>
		@endif
    </body>
</html>