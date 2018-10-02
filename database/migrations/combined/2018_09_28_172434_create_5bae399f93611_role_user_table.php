<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5bae399f93611RoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('role_user')) {
            Schema::create('role_user', function (Blueprint $table) {
                $table->integer('role_id')->unsigned()->nullable();
                $table->foreign('role_id', 'fk_p_212917_212918_user_r_5bae399f9372f')->references('id')->on('roles')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_212918_212917_role_u_5bae399f937b6')->references('id')->on('users')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
