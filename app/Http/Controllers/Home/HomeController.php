<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Components\Recusive;

class HomeController extends Controller
{
    private $product;
    private $slider;
    private $category;
    public function __construct(Product $product, Slider $slider, Category $category)
    {
        $this->product = $product;
        $this->slider = $slider;
        $this->category = $category;
    }
    public function getCategory($parent_id = '')
    {
        $cate = $this->category->all();
        $recusive = new Recusive($cate);
        $htmlOption = $recusive->cateMod($parent_id);
        return $htmlOption;
    }
    public function index()
    {
        $products = $this->product->latest()->paginate(15);
        $productRamdom = $this->product->inRanDomOrder()->paginate(15);
        $first =  $this->slider->latest()->where('active', 1)->first();
        $sliders = $this->slider->latest()->where('active', 1)->where('id', '<>', $first->id)->get();
        $categoryMenu = $this->category->where('parent_id', 0)->where('addMenu', 1)->where('active', 1)->orderby('id', 'DESC')->get();
        return view('home.home', [
            'title' => 'Trang Chủ',
            'products' => $products,
            'sliders' => $sliders,
            'first' => $first,
            'categoryMenu' => $categoryMenu,
            'productRamdom' => $productRamdom,
        ]);
    }
    public function category($slug)
    {
        $htmlOption = $this->getCategory();
        $categoryMenu = $this->category->where('parent_id', 0)->where('addMenu', 1)->where('active', 1)->orderby('id', 'DESC')->get();
        $category = $this->category->where('slug', $slug)->first();
        $catechild = $this->category->where('parent_id', $category->id)->select('id')->get();
        $products = $this->product->orderby('id', 'desc')
            ->join('product_categories', 'products.id', 'product_categories.productId')
            ->where('product_categories.categoryId', $category->id)
            ->orwhere('product_categories.categoryId', $category->parent_id)
            ->paginate(5);
        return view('home.product.productList', [
            'title' => $category->name . ' - Product',
            'tieude' => $category->name,
            'products' => $products,
            'categoryMenu' => $categoryMenu,
            'htmlOption' =>  $htmlOption,

        ]);
    }
    public function search(Request $req)
    {
        $tieude = "";
        $name = $price1 = $price2 = "";
        $name = $req->input('name', "");
        $cateId = $req->input('category', "");
        $price1 = !empty($req->price1) ? $req->price1 : 0;
        $price2 = !empty($req->price2) ? $req->price2 : 0;
        $price2 = $req->input('price2', 0);
        if ($price2 < $price1 && $price2 != 0) {
            return redirect()->back()->with('error', 'Giá nhập sau phải lớn hơn giá trước');
        }
        $search = $req->search ? $req->search : '';
        if ($search != '') {
            $products = $this->product
                ->where('productName', 'like', '%' . $search . '%');
            $tieude = $search;
        } else {
            if ($cateId) {
                if ($name && $price2) {
                    $products = $this->product
                        ->join('product_categories', 'product_categories.productId', 'products.id')
                        ->where([
                            ['productName', 'like', '%' . $name . '%'],
                            ['product_categories.categoryId', $cateId]
                        ])
                        ->whereBetween('price', [$price1, $price2]);
                } elseif ($price2) {
                    $products = $this->product
                        ->join('product_categories', 'product_categories.productId', 'products.id')
                        ->where('product_categories.categoryId', $cateId)
                        ->whereBetween('price', [$price1, $price2]);
                } elseif ($name) {
                    $products = $this->product
                        ->join('product_categories', 'product_categories.productId', 'products.id')
                        ->where([
                            ['productName', 'like', '%' . $name . '%'],
                            ['product_categories.categoryId', $cateId],
                            ['price', '>=', $price1]
                        ]);
                } else {
                    $products = $this->product
                        ->join('product_categories', 'product_categories.productId', 'products.id')
                        ->where([
                            ['product_categories.categoryId', $cateId],
                            ['price', '>=', $price1]
                        ]);
                }
            } else {
                if ($name && $price2) {

                    $products = $this->product
                        ->where('productName', 'like', '%' . $name . '%')
                        ->whereBetween('price', [$price1, $price2]);
                } elseif ($price2) {
                    $products = $this->product
                        ->whereBetween('price', [$price1, $price2]);
                } elseif ($name) {

                    $products = $this->product
                        ->where(
                            ['productName', 'like', '%' . $name . '%'],
                            ['price', '>=', $price1]
                        );
                } else {
                    $products = $this->product
                        ->where('price', '>=', $price1);
                }
            }
        }

        $htmlOption = $this->getCategory($cateId);
        $categoryMenu = $this->category->where('parent_id', 0)->where('addMenu', 1)->where('active', 1)->orderby('id', 'DESC')->get();
        $tieude = $name != null ?  $name : "";
        $products = $products->paginate(12);
        $productLienquan = $this->product->orderbyRaw('rand()')->limit(5)->get();
        return view('home.product.search', [
            'title' =>   'Search - Product',
            'tieude' => $tieude,
            'products' => $products,
            'categoryMenu' => $categoryMenu,
            'htmlOption' => $htmlOption,
            'name' => $name,
            'price1' => $price1,
            'price2' => $price2,
            'name' => $name,
            'productLienquan' =>  $productLienquan
        ]);
    }

    public function productDetail($slug)
    {
        $htmlOption = $this->getCategory();
        $categoryMenu = $this->category->where('parent_id', 0)->where('addMenu', 1)->where('active', 1)->orderby('id', 'DESC')->get();
        $product = $this->product->where('ProductSlug', $slug)->first();

        if ($product == null) {
            return  redirect()->back()->with('error', 'Do not found product');
        }
        return view('home.product.productDetail', [
            'title' => "Product",
            'tieude' => $product->productName,
            'product' => $product,
            'categoryMenu' => $categoryMenu,
            'htmlOption' =>  $htmlOption,


        ]);
    }
}
