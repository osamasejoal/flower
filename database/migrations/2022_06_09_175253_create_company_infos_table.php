<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('doamin_name');
            $table->string('email');
            $table->text('description');
            $table->string('phone');
            $table->string('call_time')->comment('when viewers can call you');
            $table->string('city');
            $table->string('country');
            $table->string('location')->comment('write your full location here');
            $table->string('logo');
            $table->string('developed_by');
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
        Schema::dropIfExists('company_infos');
    }
}
