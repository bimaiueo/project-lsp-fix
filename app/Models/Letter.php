<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Letter extends Model {
    use HasFactory;
    protected $fillable=['nomor_surat','category_id','judul','file_path','archived_at'];
    protected $casts=['archived_at'=>'datetime'];
    public function category(){ return $this->belongsTo(Category::class); }
}