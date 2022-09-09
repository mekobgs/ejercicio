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
        Schema::create('projects_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employeeId');
            $table->unsignedInteger('projectId');
            $table->timestamps();
            $table->foreign('employeeId')->references('id')->on('employees');
            $table->foreign('projectId')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects_employees');
        //$table->dropForeign('projects_employees_employeeId_foreign');
        //$table->dropForeign('projects_employees_projectId_foreign');
    }
};
