<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use League\CommonMark\Normalizer\SlugNormalizer;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    private $category;

    public function __construct(Category $cate)
    {
        $this->category = $cate;
    }
    public function show(Request $req)
    {
        $page= isset($req->page)? $req->page: 1; 
        $quantity=10;
        $stt = ($page-1)*$quantity+1;
        $category = $this->category->latest()->paginate($quantity);
        return view('admin.category.show', [
            'title' => 'Category',
            'tieude' => 'Danh mục',
            'category' => $category,
            'stt' => $stt
            
        ]);
    }
    public function add()
    {
        $htmlOption=$this->getCategory($parentId='');
        return view('admin.category.add', [
            'title' => 'Add category',
            'tieude' => 'Thêm danh mục',
            'htmlOption' => $htmlOption,
        ]);
    }
    public function create(Request $req)
    {
        $data=$req->validate([
            'name' => 'required|unique:categories',   
        ]);
        $category=$this->category->create([
            'name' => $data['name'],
            'slug' => str::slug($data['name']),
            'active' => $req->input('active',0),
            'addMenu' => $req->input('addMenu',0),
            'parent_id' => $req-> parent_id,
       ]);
     
      return redirect()->route('category-add')->with('success','Đã thêm thành công: '.$category->name);
       
    }

    public function getCategory($parentId){
        $data= $this->category->all();
        $recusive=new Recusive($data);
        $htmlOption=$recusive->cateMod($parentId);
        return $htmlOption;
    }
    public function edit($id){
        $category=$this->category::find($id);
       $htmlOption=$this->getCategory($category->parent_id);
       return view('admin.category.edit',[
           'title' =>'Edit danh mục',
           'tieude' => 'Sửa danh mục '.$category->name,
           'htmlOption'=> $htmlOption,
           'category' => $category,
       ]);
    }
    public function update(Request $req){
        $data=$req->validate([
            'name' => 'required',
        ]);
        $this->category::find($req->id)->update([
            'name'=>$data['name'],
            'slug' => str::slug($data['name']),
            'active' => $req->input('active',0),
            'parent_id' => $req->parent_id,
            'addMenu' => $req->input('addMenu',0),
        ]);
        return redirect()->route('category-show')->with('success','Sửa thành công danh mục :'.$data['name']);
    }
    public function delete($id){
        $cate=$this->category::find($id);
        if(!empty($cate)){
           $cate->delete();
           return redirect()->back()->with('success','Đã xóa thành công '.$cate->name);
        }
      return redirect()->back()->with('error','DO not found this category');
    }
    public function restore(){
        $category=$this->category->onlyTrashed()->paginate(20);
       
        return view('admin.category.restore',[
            'title' => 'Restore Category',
            'tieude' => 'Danh sách Danh mục bị xóa',
            'category' => $category
        ]);
    }
    public function restored($id){
        $category=$this->category->onlyTrashed()->where('id',$id)->first();  
        if($category != null){
            $category->restore();
        }
      
        return redirect()->back()->with('success','Đã khôi phục thành công danh mục '. $category->name);
    }
    public function deleteOver($id){
        $category=$this->category->withTrashed()->where('id',$id)->first();  
        $category->forceDelete();
        return redirect()->back()->with('success','Đã xóa khỏi Database danh mục '. $category->name);
    }
}
