<?php
namespace App\Http\Controllers;
use App\Models\{Letter,Category};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class LetterController extends Controller {
    public function index(Request $r){
        $q=$r->get('q');
        $letters=Letter::with('category')->when($q,fn($qb)=>$qb->where('judul','like',"%{$q}%"))
            ->orderByDesc('created_at')->paginate(10)->withQueryString();
        return view('letters.index',compact('letters','q'));
    }
    public function create(){ $categories=Category::orderBy('name')->get(); return view('letters.form',compact('categories')); }
    public function store(Request $r){
        $data=$r->validate([
            'nomor_surat'=>'required|max:255',
            'category_id'=>'required|exists:categories,id',
            'judul'=>'required|max:255',
            'file'=>'required|mimes:pdf|max:20480'
        ]);
        $path=$r->file('file')->store('letters','public');
        Letter::create([
            'nomor_surat'=>$data['nomor_surat'],
            'category_id'=>$data['category_id'],
            'judul'=>$data['judul'],
            'file_path'=>$path,
            'archived_at'=>now(),
        ]);
        return redirect()->route('letters.index')->with('ok','Data berhasil disimpan');
    }
    public function show(Letter $letter){ $letter->load('category'); return view('letters.show',compact('letter')); }
    public function download(Letter $letter){ $name=Str::slug($letter->judul?:'surat').'.pdf'; return Storage::disk('public')->download($letter->file_path,$name); }
    public function update(Request $r, Letter $letter){
        $r->validate(['file'=>'required|mimes:pdf|max:20480']);
        if($letter->file_path && Storage::disk('public')->exists($letter->file_path)){ Storage::disk('public')->delete($letter->file_path); }
        $path=$r->file('file')->store('letters','public'); $letter->update(['file_path'=>$path]);
        return back()->with('ok','File berhasil diganti');
    }
    public function destroy(Letter $letter){
        if($letter->file_path && Storage::disk('public')->exists($letter->file_path)){ Storage::disk('public')->delete($letter->file_path); }
        $letter->delete(); return back()->with('ok','Data berhasil dihapus');
    }
}