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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('make_brand')->nullable();
            $table->string('model')->nullable();
            $table->string('location')->nullable();
            $table->string('year_of_manufacture')->nullable();
            $table->string('color')->nullable();
            $table->string('condition')->nullable();
            $table->string('transmission')->nullable();
            $table->string('car_registered')->nullable();
            $table->string('fuel')->nullable();
            $table->string('seats')->nullable();
            $table->string('doors')->nullable();
            $table->string('price')->nullable();
            $table->string('price_negotiable')->nullable();
            $table->string('listed_by')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('status')->nullable();
            $table->string('attachment_id')->nullable();
            $table->string('description')->nullable();
            $table->integer('user_id')->default(1);
            $table->integer('total_click')->default(0);
            $table->integer('is_feature')->default(0);
            $table->string('feature_status')->default('inactive');
            $table->string('feature_start_date')->nullable();
            $table->string('feature_end_date')->nullable();
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
        Schema::dropIfExists('ads');
    }
};
