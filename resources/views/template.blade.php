<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Proyecto web</title>

	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
	<div class="container px-4 mx-auto">
		<header class="flex justify-between items-center py-4">
			<div class="flex items-center flex-grow gap-4">
				<a href="{{ route('home') }}">
					<img src="{{ asset('images/logo.png') }}" class="h-12">
				</a>
				<form action="{{ route('home') }}" class="flex-grow relative flex items-center" method="GET">
					<!-- Search Input -->
					<input 
						type="text" 
						name="search" 
						placeholder="Search" 
						value="{{ request('search') }}" 
						class="border border-gray-200 rounded py-2 px-4 w-1/2"
						id="searchInput"
					>
				
					<!-- Clear "X" Button (Only shows when there's input) -->
					@if(request('search'))
						<button type="button" onclick="clearSearch()" 
							class="relative right-[20px] top-[10px] transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
							&times;
						</button>
					@endif
				
					<!-- Search Button -->
					<button type="submit" class="ml-2 bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700">
						Search
					</button>
				</form>
				
			</div>

			@auth
			<a href="{{ route('dashboard') }}">Dashboard</a>
			@else
			<a href="{{ route('login') }}">Login</a>
			@endif
		</header>

		<div class="opacity-60 h-px mb-8" style="
			background: linear-gradient(to right, 
				rgba(200, 200, 200, 0) 0%,
				rgba(200, 200, 200, 1) 30%,
				rgba(200, 200, 200, 1) 70%,
				rgba(200, 200, 200, 0) 100%
			);
		">
			
		</div>

		@yield('content')

		<p class="py-16">
			<img src="{{ asset('images/logo.png') }}" class="h-12 mx-auto">
		</p>
	</div>

	<script>
		function clearSearch() {
			document.getElementById('searchInput').value = ''; // Clear input
			window.location.href = "{{ route('home') }}"; // Redirect to remove search param
		}
	</script>
	
	

</body>
</html>
