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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger("created_by")->nullable()->foreign("created_by")->refrences("id")->on("users");
            $table->unsignedBigInteger("updated_by")->nullable()->foreign("updated_by")->refrences("id")->on("users");
            $table->unsignedBigInteger("deleted_by")->nullable()->foreign("deleted_by")->refrences("id")->on("users");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
};
