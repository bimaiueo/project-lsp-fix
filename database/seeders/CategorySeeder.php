<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder {
  public function run(): void{
    $items=[
      ['name'=>'Undangan','description'=>'Undangan rapat, koordinasi, dsb.'],
      ['name'=>'Pengumuman','description'=>'Surat terkait pengumuman.'],
      ['name'=>'Nota Dinas','description'=>'Nota dinas internal.'],
      ['name'=>'Pemberitahuan','description'=>'Surat pemberitahuan umum.'],
    ];
    foreach($items as $i){ Category::firstOrCreate(['name'=>$i['name']],$i); }
  }
}