<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Sayem Travels | @yield('title')</title>
</head>
<body>

 <div class="container mx-auto px-20">
  @include('partials.navbar')
  @yield('content' , $slot ?? '')
 </div>
   
 
</body>
</html>