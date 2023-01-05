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
        Schema::create('skill_sets', function (Blueprint $table) {
            $table->unsignedBigInteger("candidate_id")->foreign("candidate_id")->refrences("id")->on("candidates");
            $table->unsignedBigInteger("skill_id")->foreign("skill_id")->refrences("id")->on("skills");
            $table->primary(['candidate_id','skill_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skill_sets');
    }
};
