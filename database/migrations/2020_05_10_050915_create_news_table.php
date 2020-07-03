<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->collation('utf8mb4_unicode_ci');
            $table->string('slug')->index()->collation('utf8mb4_unicode_ci');
            $table->string('image',255)->collation('utf8mb4_unicode_ci')->nullable(); // anh
            $table->integer('is_active')->default(1); // trạng thái
            $table->integer('position')->default(0); // vi trí
            $table->text('summary')->collation('utf8mb4_unicode_ci')->nullable(); // thông tin tóm tắt về sản phẩm
            $table->text('description')->collation('utf8mb4_unicode_ci')->nullable(); // mô tả chi tiết
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
