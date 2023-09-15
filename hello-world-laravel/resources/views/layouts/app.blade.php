<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Layout</title>
</head>


<body style="
	margin: 0;
	padding: 0;
	height:100vh;
	display: flex;
	flex-direction: column
  ">
  <x-nav>
  </x-nav>

  <main style="padding: 20px; flex: 1;">
    @yield('content')
  </main>

  <x-footer>
  </x-footer>
</body>

</html>
