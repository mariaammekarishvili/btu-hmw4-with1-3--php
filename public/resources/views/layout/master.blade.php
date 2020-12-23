<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Laravel</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body class="antialiased">
      <div class="relative flex items-top justify-center min-h-screen  dark:bg-red-900 sm:items-center sm:pt-0">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">bg-red-100
            <a class="navbar-brand" href="/">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">

                     @auth
                        <li class="nav-item active">
                           <a class="nav-link" href="/posts/my-posts">My post</a>
                        </li>
                        <li class="nav-item active">
                           <a class="nav-link" href="/posts/create">Add smth.</a>
                        </li>
                        <li class="nav-item active">
                           <a class="nav-link" href="/logout">Log out</a>
                        </li>
                     @else
                        <li class="nav-item active">
                           <a class="nav-link" href="/login">Log in</a>
                        </li>
                     @endif

               </ul>
            </div>
         </nav>
         <div id="content">
            @yield('content')
         </div>
      </div>
   </body>
</html>
