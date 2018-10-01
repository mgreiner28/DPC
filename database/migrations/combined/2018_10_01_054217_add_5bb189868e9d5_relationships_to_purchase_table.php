<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5bb189868e9d5RelationshipsToPurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchases', function(Blueprint $table) {
            if (!Schema::hasColumn('purchases', 'assigned_to_id')) {
                $table->integer('assigned_to_id')->unsigned()->nullable();
                $table->foreign('assigned_to_id', '213913_5bb18851b0da3')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('purchases', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '213913_5bb18851c6aef')->references('id')->on('users')->onDelete('cascade');
                }
                if (!Schema::hasColumn('purchases', 'created_by_team_id')) {
                $table->integer('created_by_team_id')->unsigned()->nullable();
                $table->foreign('created_by_team_id', '213913_5bb18851dbc5f')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::table('purchases', function(Blueprint $table) {
            if(Schema::hasColumn('purchases', 'assigned_to_id')) {
                $table->dropForeign('213913_5bb18851b0da3');
                $table->dropIndex('213913_5bb18851b0da3');
                $table->dropColumn('assigned_to_id');
            }
            if(Schema::hasColumn('purchases', 'created_by_id')) {
                $table->dropForeign('213913_5bb18851c6aef');
                $table->dropIndex('213913_5bb18851c6aef');
                $table->dropColumn('created_by_id');
            }
            if(Schema::hasColumn('purchases', 'created_by_team_id')) {
                $table->dropForeign('213913_5bb18851dbc5f');
                $table->dropIndex('213913_5bb18851dbc5f');
                $table->dropColumn('created_by_team_id');
            }
            
        });
    }
}
