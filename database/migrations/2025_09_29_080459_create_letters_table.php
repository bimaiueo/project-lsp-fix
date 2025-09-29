<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration{
  public function up(): void{
    Schema::create('letters', function(Blueprint $t){
      $t->id(); $t->foreignId('category_id')->constrained()->cascadeOnDelete();
      $t->string('nomor_surat'); $t->string('judul'); $t->string('file_path'); $t->timestamp('archived_at')->nullable(); $t->timestamps();
    });
  }
  public function down(): void{ Schema::dropIfExists('letters'); }
};