
    @if (count($products) > 0)
    <ul class="products">
        @foreach ($products as $product)
            <li>
                <div class="product-item">
                    <div class="product-top">
                        <a href="{{route('product-detail',['slug'=>$product->productSlug])}}" class="product-thumb">
                            <img src="{{ asset('uploads/product/' . $product->image) }}"
                                alt="{{ $product->productName }}">
                        </a>
                        <a href="{{route('product-detail',['slug'=>$product->productSlug])}}" class="buy-now">Mua ngay</a>
                        @if ($product->sale != 0)
                            <span class="sale">-{{ $product->sale }}%</span>
                        @endif

                    </div>
                    <div class="product-info">
                        <div class="product-cat">
                            @foreach ($product->category as $cateItem)
                                <span>{{ $cateItem->slug }} , </span>
                            @endforeach
                        </div>
                        <a href="{{route('product-detail',['slug'=>$product->productSlug])}}" class="product-name">{{ $product->productName }}</a>
                        <div class="product-price ">
                            @if ($product->sale != 0)
                                <span class="gach">{{ number_format($product->price) }}</span>
                                <span class="red">->
                                    {{ number_format($product->price - ($product->price / 100) * $product->sale) }}
                                    VNĐ</span>
                            @else
                                <span class="">{{ number_format($product->price) }} VNĐ</span>
                            @endif

                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
        @if ($pagi!=0)
        <div class="paginate col-12 row">
            {!!$products->links()!!}
        </div>
        @endif
    @else
        <div class="thongBao">
            <p>Không tìm thấy sản phẩm: {{$nameProduct}}. Vui lòng quay lại sau.....</p>
        </div>
    @endif


