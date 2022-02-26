<?php

namespace App\Http\Controllers\Admin;

use App\Components\Recusive;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Components\Image;
use App\Models\product_category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    private $product;
    private $category;
    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }
    public function show(Request $req)
    {
        $page = isset($req->page) ? $req->page : 1;
        $quantity = 6;
        $stt = ($page - 1) * $quantity + 1;
        $showAll = '';
        if ($req->search && $req->search != '') {
            $search = $req->search;
            $products = $this->product->orderby('id', 'desc')->where('productName', 'like', '%' . $search . '%')->orwhere('tag', 'like', '%' . $search . '%');
            $tieude = 'Đang tìm sản phẩm : ' . $search;
            $showAll = 1;
        } elseif ($req->slug && $req->slug != '') {
            $slug = $req->slug;
            $danhmuc = $this->category->where('slug', $slug)->first(['id', 'name']);
            $products = $this->product->orderby('id', 'desc')
                ->join('product_categories', 'product_categories.productId', 'products.id')
                ->where('product_categories.categoryId', $danhmuc->id);
            $tieude = 'Đang tìm sản phẩm : ' . $danhmuc->name;
            $showAll = 1;
        } else {
            $products = $this->product->orderby('id', 'desc');
            $tieude = 'Danh sách sản phẩm';
        }
        $soLuong = $products->count();
        $products = $products->paginate($quantity);
        return view('admin.product.show', [
            'title' => 'Product',
            'tieude' =>  $tieude . ' (' . $soLuong . ')',
            'products' => $products,
            'stt' => $stt,
            'showAll' => $showAll
        ]);
    }
    public function add()
    {
        $htmlOption = $this->getCategory();
        return view('admin.product.add', [
            'title' => 'Add Product',
            'tieude' => 'Thêm sản phẩm',
            'htmlOption' => $htmlOption
        ]);
    }
    public function getCategory($parent_id = '')
    {
        $cate = $this->category->all();
        $recusive = new Recusive($cate);
        $htmlOption = $recusive->cateMod($parent_id);
        return $htmlOption;
    }
    public function create(Request $req)
    {
        $data = $req->validate([
            'name' => 'required|unique:products,productName',
            'price' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpg,png,gif,svg,jpeg|max:2048',
            'tag' => 'required',
        ]);
        $nameImages = '';
        if ($req->images) {
            foreach ($req->images as $imageItem) {
                $Image = new Image;
                if ($nameImages != null) {
                    $nameImages = $nameImages . '!' . $Image->UploadImage($imageItem, 'product', auth::id(), str::slug($data['name']));
                } else {
                    $nameImages = $Image->UploadImage($imageItem, 'product', auth::id(), $req->name);
                }
            }
        }
        $Image = new Image;
        $nameImage = $Image->UploadImage($req->image, 'product', auth::id(), str::slug($data['name']));
        $product = $this->product->create([
            'productName' => $data['name'],
            'productSlug' => str::slug($data['name']),
            'active' => $req->input('active', 0),
            'status' => $req->input('status', 0),
            'image' => $nameImage,
            'images' =>  $nameImages,
            'price' => $data['price'],
            'sale' => $req->input('sale', 0),
            'userId' => auth::id(),
            'tag' => implode('!', $req->input('tag')),
            'description' => $req->input('description', ''),
        ]);
        $product->category()->sync($data['category']);
        return redirect()->back()->with('success', 'Thêm thành công sản phẩm ' . $data['name']);
    }


    public function edit($id)
    {
        $cateIds = "";
        $product = $this->product::find($id);
        foreach ($product->category as $cates) {
            if ($cateIds == '') {
                $cateIds =  $cates->id;
            } else {
                $cateIds = $cateIds . "!" . $cates->id;
            }
        }
        $cateIds = explode('!', $cateIds);
        $cate = $this->category->all();
        $recusive = new Recusive($cate);
        $htmlOption = $recusive->cateEdit($cateIds);


        if (empty($product)) {
            return redirect()->back()->with('errors', 'Không tìm thấy sản phẩm cẩn tìm');
        }
        return view('admin.product.edit', [
            'title' => 'Edit product',
            'tieude' => 'Sửa sản phẩm',
            'product' => $product,
            'htmlOption' => $htmlOption
        ]);
    }
    public function update(Request $req)
    {
        $data = $req->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'image' => 'image|mimes:jpg,png,gif,svg,jpeg|max:2048',
            'tag' => 'required',
            'id' => 'required',

        ]);
        $product = $this->product::find($req->id);
        if ($product == null) {
            return redirect()->back()->with('error', 'Không tìm thấy sản phẩm');
        }
        $nameImages = '';
        if ($req->images) {
            $Image = new Image;
            foreach (explode('!', $product->images) as $imageDetail) {
                $Image->DelImage('product', $imageDetail);
            }
            foreach ($req->images as $imageItem) {
                if ($nameImages != null) {
                    $nameImages = $nameImages . '!' . $Image->UploadImage($imageItem, 'product', auth::id(), str::slug($data['name']));
                } else {
                    $nameImages = $Image->UploadImage($imageItem, 'product', auth::id(), str::slug($data['name']));
                }
            }
            $product->update([
                'images' => $nameImages
            ]);
        }
        if ($req->image) {
            $Image = new Image;
            $nameImage = $Image->UpdateImage($req->image, 'product', auth::id(), str::slug($data['name']), $product->image);
            $product->update([
                'image' => $nameImage
            ]);
        }
        $sale=$req->sale?$req->sale:0;
        $product->update([
            'productName' => $data['name'],
            'productSlug' => str::slug($data['name']),
            'active' => $req->input('active', 0),
            'status' => $req->input('status', 0),
            'price' => $data['price'],
            'sale' =>  $sale,
            'userEdit' => auth::id(),
            'tag' => implode('!', $req->input('tag')),
            'description' => $req->input('description', ''),
        ]);
        $product->category()->sync($data['category']);
        return redirect()->back()->with('success', 'Thêm thành công sản phẩm ' . $data['name']);
    }
    public function delete($id)
    {
        $product = $this->product::find($id);
        if ($product == null) {
            return redirect()->back()->with('error', 'Không tìm thấy product');
        }

        $product->delete();
        return redirect()->back()->with('success', 'Xóa thành công Sản phẩm: ' . $product->productName);
    }
    public function restore()
    {
        $products = $this->product->onlyTrashed()->paginate(10);

        return view('admin.product.restore', [
            'title' => 'Danh sách product bị xóa',
            'tieude' => 'Danh sách product bị xóa',
            'products' => $products
        ]);
    }
    public function restored($id)
    {
        $product = $this->product->onlyTrashed()->where('id', $id)->first();
        if ($product == null) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }
        $product->restore();
        return redirect()->back()->with('success', 'Đã khôi phục sản phẩm : ' . $product->productName);
    }
    public function deleteOver($id)
    {
        $product = $this->product->onlyTrashed()->where('id', $id)->first(); 
        if ($product == null) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }
        $Image = new Image;
        $Image->DelImage('product', $product->image);
        foreach (explode('!', $product->images) as $imageDetail) {
            $Image->DelImage('product', $imageDetail);
        }
        $product->ForceDelete();
        return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi database ' );
    }
}
