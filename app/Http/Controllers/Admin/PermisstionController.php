<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permisstion;
use Illuminate\Http\Request;
use App\Components\PerRecusive;


class PermisstionController extends Controller
{
    private $per;
    public function __construct(Permisstion $per, PerRecusive $perRecusive)
    {
        $this->per = $per;
        $this->perRecusive = $perRecusive;
    }
    public function show()
    {
        $permisstion = $this->per->where('parent_id', 0)->get();
        return view('admin.permisstion.show', [
            'title' => 'Permisstions',
            'tieude' => 'Danh sách Permisstion',
            'per' => $permisstion
        ]);
    }
    public function add()
    {
        $modules = config('permisstion.module');
        $module_childs = config('permisstion.module_child');
        $permisstions = $this->per->where('parent_id', 0)->get();
        $html = $this->perRecusive->perAdd($modules);
        return view('admin.permisstion.add', [
            'title' => 'Permisstions',
            'tieude' => 'Tạo Permisstion',
            'module_childs' =>  $module_childs,
            'modules' =>  $modules,
            'permisstions' => $permisstions,
            'html' => $html

        ]);
    }

    public function create(Request $req)
    {
        $data = $req->validate([
            'name' => 'Required|unique:permisstions,name'
        ]);
        $name = strtolower($data['name']);
        $per = $this->per->create([
            'name' => $name,
            'display' => $data['name'],
            'parent_id' => 0,
            'key' => '',
        ]);
        if ($req->module_child) {
            foreach ($req->module_child as $child) {
                $this->per->create([
                    'name' => $per->name . $child,
                    'display' => $child . ' ' . $per->name,
                    'parent_id' =>  $per->id,
                    'key' =>  $per->name . $child,
                ]);
            }
        }
        return redirect()->back()->with('success', 'Đã tạo permisstion : ' . $per->name);
    }

    public function delete($id)
    {
        $permisstions = $this->per
            ->where('id',$id)->orWhere('parent_id',$id)
            ->get();
        foreach($permisstions as $per){
            $per->delete();
        }
        return redirect()->back()->with('success','Xóa thành công ');
    }
}
