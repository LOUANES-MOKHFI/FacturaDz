@if(session()->has('success'))
	<script type="text/javascript">
		window.onload = function(){
			notif({
				msg : '{{ session()->get('success') }}',
				type : "success"
			});
		}
	</script>
@elseif(session()->has('error'))
	<script type="text/javascript">
		window.onload = function(){
			notif({
				msg : {{ session()->get('error') }},
				type : "error"
			});
		}
	</script>
@endif

			
