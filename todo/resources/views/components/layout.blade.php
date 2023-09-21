<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $pageTitle ?? 'B7Web Todo' }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Rubik:wght@400;500&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="/assets/css/style.css" />
</head>

<body>
  <div class="container">
    <div class="sidebar">
      <a href="/">
        <img src="/assets/images/logo.png" alt="Logo da aplicação" />
      </a>
    </div>
    <div class="content">
      <nav>
        <a class="btn" href="{{ route('home') }}">Home (tmp) </a>
        <a class="btn" href="{{ route('login') }}">Login (tmp) </a>
        <a class="btn" href="{{ route('register') }}">Registre-se (tmp) </a>

        {{ $btn ?? null }}

      </nav>
      <main>
        {{ $slot }}
      </main>
    </div>
  </div>
</body>

</html>
