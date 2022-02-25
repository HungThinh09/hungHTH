<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisstionRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisstion_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('roleId');
            $table->foreign('roleId')->references('id')->on('roles')->onDelete('cascade');
            $table->unsignedBigInteger('permisstionId');
            $table->foreign('permisstionId')->references('id')->on('permisstions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisstion_roles');
    }
}
