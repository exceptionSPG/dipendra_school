<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bi_bya_sas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation'); //adhyaksh, upadhyaksh,sachib
            $table->string('photo');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->string('profession');
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
        Schema::dropIfExists('bi_bya_sas');
    }
};
