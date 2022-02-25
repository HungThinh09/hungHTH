<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Str;
use App\Components;
use App\Components\Image;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    //
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider=$slider;
    }
    public function show(Request $req){
        $page= isset($req->page)? $req->page: 1; 
        $quantity=4;
        $stt = ($page-1)*$quantity+1;
        $slider= $this->slider->latest()->paginate($quantity);
        return view('admin.slider.show',[
            'title' => 'Slider',
            'tieude'=> 'Slider',
            'slider' => $slider,
            'stt' => $stt
        ]);
    }
    public function add(){
        return view('admin.slider.add',[
            'title'=>'ADD Slider',
            'tieude' => 'Thêm Slider',
        ]);
        
    }
    public function create(Request $req){
        $data=$req->validate([
            'name' => 'required|unique:sliders,name',
            'image' => 'image|required'
        ]);
        $image=new Image;
        $nameImage=$image->UploadImage($data['image'],'slider',auth::id(),str::slug($data['name']));
        $slider=$this->slider->create([
            'name' => $data['name'],
            'slug' => str::slug($data['name']),
            'image'=> $nameImage,
            'active'=> $req->input('active',0),
        ]);
        return redirect()->back()->with('success','Đã thêm thành công slider : '.$data['name']);
    }
    public function edit($id){
       
        $slider=$this->slider::find($id);
       
        if(empty($slider)){
            return redirect()->back()->with('error','Không tìm thấy Slider');
        }
        return view('admin.slider.edit',[
            'tieude' => 'Sửa slider',
            'title' => 'Edit Slider',
            'slider'=> $slider
        ]);
    }
    public function update(Request $req){
      
        $data=$req->validate([
            'name' => 'required',
            'image' => 'image',
            'id'    => 'required'
        ]); 
         $slider=$this->slider::find($data['id']);
         if($req->image){
            $image=new Image;
            $nameImage=$image->UpdateImage($data['image'],'slider',auth::id(),str::slug($data['name']),$slider->image);
            $slider->update([
                'image'=> $nameImage,
            ]);
         } 
        $slider->update([
            'name' => $data['name'],
            'slug' => str::slug($data['name']),
            'active'=> $req->input('active',0),
        ]);
        return redirect()->route('slider-show')->with('success','Đã sửa thành công slider : '.$data['name']);
    }
    public function delete($id){
        $slider=$this->slider::find($id);
        if($slider==null){
            return redirect()->back()->with('error','không tìm thấy slider');
        }
        $image=new Image;
        $image->DelImage('slider',$slider->image);
        $slider->delete();
        return redirect()->back()->with('success','đã xóa slider: '.$slider->name);
    }
}
