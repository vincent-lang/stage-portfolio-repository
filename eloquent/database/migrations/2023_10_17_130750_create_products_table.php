<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->references('id')->on('shops');
            $table->string('product_name');
            $table->string('artikel_nr');
            $table->timestamps();
        });

        DB::table('products')->insert([
            'shop_id' => 1,
            'product_name' => 'apple',
            'artikel_nr' => 'A0001'
        ]);
        DB::table('products')->insert([
            'shop_id' => 1,
            'product_name' => 'banana',
            'artikel_nr' => 'A0002'
        ]);
        DB::table('products')->insert([
            'shop_id' => 2,
            'product_name' => 'advertisment',
            'artikel_nr' => 'A0001'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
