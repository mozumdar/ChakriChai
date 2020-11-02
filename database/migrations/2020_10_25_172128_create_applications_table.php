<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status')->default(0);
            $table->integer('user_id');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_phone');
            $table->string('user_coverletter');
            $table->string('user_resume');
            $table->string('user_avatar');
            $table->integer('job_id');
            $table->string('job_title');
            $table->string('job_position');
            $table->integer('company_id');
            $table->string('company_name');
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
        Schema::dropIfExists('applications');
    } 
}
