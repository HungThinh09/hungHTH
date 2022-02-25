   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>
       {{ $title != null ? $title : 'Trang chủ HTH' }}
   </title>

   <link rel="stylesheet" href="{{ asset('admins/plugins/fontawesome-free/css/all.min.css') }}">
   <!-- Theme style -->
   <link rel="stylesheet" href="{{ asset('admins/dist/css/adminlte.min.css') }}">
   <link rel="stylesheet" href="{{ asset('homes\css\css.css') }}">
   <link rel="stylesheet" href="{{ asset('homes\css\prodcutList.css') }}">
   <link rel="stylesheet" href="{{ asset('homes\css\cart.css') }}">
   <link rel="stylesheet" href="{{ asset('homes\css\backToTop.css') }}">
   @yield('css')
