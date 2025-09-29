<?php
namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller {
    public function index(Request $r){
        $q=$r->get('q');
        $categories=Category::query()
            ->when($q,fn($qb)=>$qb->where('name','like',"%{$q}%")
                ->orWhere('description','like',"%{$q}%"))
            ->orderBy('id')->paginate(10)->withQueryString();
        return view('categories.index',compact('categories','q'));
    }
    public function create(){ $category=new Category(); return view('categories.form',compact('category')); }
    public function store(Request $r){
        $data=$r->validate(['name'=>'required|max:255','description'=>'nullable']);
        Category::create($data); return redirect()->route('categories.index')->with('ok','Kategori berhasil disimpan');
    }
    public function edit(Category $category){ return view('categories.form',compact('category')); }
    public function update(Request $r, Category $category){
        $data=$r->validate(['name'=>'required|max:255','description'=>'nullable']);
        $category->update($data); return redirect()->route('categories.index')->with('ok','Kategori berhasil diperbarui');
    }
    public function destroy(Category $category){ $category->delete(); return back()->with('ok','Kategori berhasil dihapus'); }
}