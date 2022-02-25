<!DOCTYPE html>
<html lang="en">
<head>
    @include('home/layout/head')
</head>

<body>

<div class="container">
        <div class="row">
            <div id="top" class="row">
                <div class="contact col-3">
                    <span>
                        <ion-icon name="call-outline"></ion-icon> : {{getSetting('phone')}}
                    </span>
                    <span>
                        <ion-icon name="reader-outline"></ion-icon> : {{getSetting('address')}}
                    </span>
                </div>
                <div class="col-6 sologan">
                    <marquee>{{getSetting('autorun')}}</marquee>
                </div>
            </div>
            
          
            @include('home.layout.menu')
            @yield('carousel')
            @yield('search')

        </div>
   
    
    <div class="content">
       @yield('content')
    </div>

</div>
    @include('home/layout/footer')

</body>

</html>
