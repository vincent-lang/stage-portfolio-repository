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
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shop_name');
            $table->string('location');
            $table->timestamps();
        });

        DB::table('shops')->insert([
            'shop_name' => 'fruit store',
            'location' => 'netherlands'
        ]);
        DB::table('shops')->insert([
            'shop_name' => 'marketing',
            'location' => 'england'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
