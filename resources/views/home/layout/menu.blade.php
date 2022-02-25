<div class="header col-12 row">
    <div class="col-12">
        <div class="container-fluid" id="menu">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{route('home')}}">Shop HTH</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('home')}}">Trang chủ</a>
                        </li>
                        @foreach ($categoryMenu as $cate)
                                @if ($cate->chilCategory->contains('parent_id',$cate->id))
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-expanded="false">
                                        {{ $cate->name }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('home-category',['slug'=>$cate->slug])}}">All product</a>
                                        @foreach ($cate->chilCategory as $item)
                                        <a class="dropdown-item" href="{{route('home-category',['slug'=>$item->slug])}}">{{ $item->name}}</a>
                                        
                                        @endforeach
                                        <div class="dropdown-divider"></div>
                                    </div>
                                </li>
                                @else
                                   <li class="nav-item ">
                                        <a class="nav-link" href="{{route('home-category',['slug'=>$cate->slug])}}"> {{ $cate->name }}</a>
                                    </li>
                                @endif
                        @endforeach
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('findOder')}}">Đơn hàng</a>
                        </li>
                    </ul>
                    <div class="carts">
                        <a href="{{route('myCart')}}">
                            <ion-icon name="cart-outline"></ion-icon>
                        </a>
                        @if (count($cart->items)>0)
                        <div class="soProduct">
                           <span>{{ count($cart->items)}}</span>
                        </div>
                        @endif
                    </div>

                </div>

            </nav>

        </div>
    </div>
</div>
