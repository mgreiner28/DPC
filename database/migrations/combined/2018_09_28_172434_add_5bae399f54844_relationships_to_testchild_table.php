<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5bae399f54844RelationshipsToTestChildTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_children', function(Blueprint $table) {
            if (!Schema::hasColumn('test_children', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '212923_5bae399ddd16b')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('test_children', 'created_by_team_id')) {
                $table->integer('created_by_team_id')->unsigned()->nullable();
                $table->foreign('created_by_team_id', '212923_5bae399df32e2')->references('id')->on('teams')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('test_children', function(Blueprint $table) {
            if(Schema::hasColumn('test_children', 'created_by_id')) {
                $table->dropForeign('212923_5bae399ddd16b');
                $table->dropIndex('212923_5bae399ddd16b');
                $table->dropColumn('created_by_id');
            }
            if(Schema::hasColumn('test_children', 'created_by_team_id')) {
                $table->dropForeign('212923_5bae399df32e2');
                $table->dropIndex('212923_5bae399df32e2');
                $table->dropColumn('created_by_team_id');
            }
            
        });
    }
}
