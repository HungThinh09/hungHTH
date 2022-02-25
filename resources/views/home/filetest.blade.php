<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>tét</title>
	<link rel="stylesheet" href="">
	<style type="text/css">
		.headline{
    text-align: center;
    margin: 40px 0;
}
.title-product{
    font-size: 18px;
    color: #111;
    padding: 10px 20px;
    text-transform: uppercase;
    border: 1px solid #bebebe;
    display: inline-block; /* boder chir bao quanh text và padding của nó */
}
ul.products{
    display: flex;
    flex-wrap: wrap;
    justify-items: flex-start;
    justify-content: flex-start;
}
ul.products li{
    padding: 0 15px;
    flex-basis: 25%; /* độ rộng của 1 thẻ li là 25% */
    box-sizing: border-box;/*  padding bao nhiêu thì độ rộng thu lại bấy nhiêu */
    padding-bottom: 20px;
   
}
ul.products li img{
    max-width: 100%;
    height: 250px;
    transition: 0.5 ease-in-out;
}

ul.products .product-top{
    position: relative;
    overflow: hidden; 
}
ul.products .product-top .product-thumb{
    display: block;
}
ul.products .product-top .product-thumb img{
    display: block;
}
ul.products li .product-top .product-thumb img{
    transition:  all 1s  ease-in-out;
}
ul.products li:hover .product-top .product-thumb img{
    opacity: 90%;
    transform: scale(1.2);

}
ul.products .product-top a.buy-now{
    text-transform: uppercase;
    text-decoration: none;
    text-align: center;
    display: block;
    background-color: rgba(68, 96, 132, 0.8);
    color: #fff;
    padding: 10px 0;
    position: absolute;
    bottom: -36px;
    width: 100%;
    transition: 0.25s ease-in-out; /* chuyên động từ từ phần hover  */
}
ul.products li:hover a.buy-now{
    bottom: 0px;
}
ul.products li .product-info{
    padding: 10px 0;
}
ul.products li .product-info a{
    display: block; /* Mỗi thẻ a 1 dònng */
    text-decoration: none;

}
ul.products li .product-info a.product-cat{
    font-size: 11px;
    color: #9e9e9e;
    text-transform: uppercase;
    padding: 3px 5px ;
}
ul.products li .product-info a.product-name{
    color: #334863;
    padding:  3px 0;
}
ul.products li .product-info .product-price{
    color: #111;
    padding: 2px 0px;
    font-weight: 600;
}
	</style>
</head>
<body>
	
	<div class="content">
            <div class="headline">
                <h3 class="title-product">San Pham ban chay</h3>
            </div>
            <ul class="products">
                <li>
                    <div class="product-item">
                        <div class="product-top">
                            <a href="" class="product-thumb">
                                <img src="{{asset('uploads\product\Áo đẹp cho nữ-1-4.jpg')}}" alt="anhr 1">
                            </a>
                            <a href="" class="buy-now">Mua ngay</a>
                        </div>
                        <div class="product-info">
                            <a href="" class="product-cat">Bab</a>
                            <a href="" class="product-name">Tui dep cho moi nguoi</a>
                            <div class="product-price">2.230,00 $</div>
                        </div>
                    </div>
                </li>
        
                <li>
                    <div class="product-item">
                        <div class="product-top">
                            <a href="" class="product-thumb">
                                <img src="uploads\product\Áo đẹp cho nữ-1-4.jpg" alt="anhr 1">
                            </a>
                            <a href="" class="buy-now">Mua ngay</a>
                        </div>
                        <div class="product-info">
                            <a href="" class="product-cat">Bab</a>
                            <a href="" class="product-name">Tui dep cho moi nguoi</a>
                            <div class="product-price">2.230,00 $</div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="product-item">
                        <div class="product-top">
                            <a href="" class="product-thumb">
                                <img src="uploads\product\Áo đẹp cho nữ-1-4.jpg" alt="anhr 1">
                            </a>
                            <a href="" class="buy-now">Mua ngay</a>
                        </div>
                        <div class="product-info">
                            <a href="" class="product-cat">Bab</a>
                            <a href="" class="product-name">Tui dep cho moi nguoi</a>
                            <div class="product-price">2.230,00 $</div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="product-item">
                        <div class="product-top">
                            <a href="" class="product-thumb">
                                <img src="image/p4-1.jpg" alt="anhr 1">
                            </a>
                            <a href="" class="buy-now">Mua ngay</a>
                        </div>
                        <div class="product-info">
                            <a href="" class="product-cat">Bab</a>
                            <a href="" class="product-name">Tui dep cho moi nguoi</a>
                            <div class="product-price">2.230,00 $</div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="product-item">
                        <div class="product-top">
                            <a href="" class="product-thumb">
                                <img src="image/p5-1.jpg" alt="anhr 1">
                            </a>
                            <a href="" class="buy-now">Mua ngay</a>
                        </div>
                        <div class="product-info">
                            <a href="" class="product-cat">Bab</a>
                            <a href="" class="product-name">Tui dep cho moi nguoi</a>
                            <div class="product-price">2.230,00 $</div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="product-item">
                        <div class="product-top">
                            <a href="" class="product-thumb">
                                <img src="image/p7-1.jpg" alt="anhr 1">
                            </a>
                            <a href="" class="buy-now">Mua ngay</a>
                        </div>
                        <div class="product-info">
                            <a href="" class="product-cat">Bab</a>
                            <a href="" class="product-name">Tui dep cho moi nguoi</a>
                            <div class="product-price">2.230,00 $</div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="product-item">
                        <div class="product-top">
                            <a href="" class="product-thumb">
                                <img src="image/p8-1.jpg" alt="anhr 1">
                            </a>
                            <a href="" class="buy-now">Mua ngay</a>
                        </div>
                        <div class="product-info">
                            <a href="" class="product-cat">Bab</a>
                            <a href="" class="product-name">Tui dep cho moi nguoi</a>
                            <div class="product-price">2.230,00 $</div>
                        </div>
                    </div>
                </li>
            </ul>
    </div>
</body>
</html>