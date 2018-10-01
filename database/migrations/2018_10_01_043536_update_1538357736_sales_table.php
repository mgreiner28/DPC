<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1538357736SalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            
if (!Schema::hasColumn('sales', 'search_update')) {
                $table->string('search_update')->nullable();
                }
if (!Schema::hasColumn('sales', 'survey_update')) {
                $table->string('survey_update')->nullable();
                }
if (!Schema::hasColumn('sales', 'tax_receipts')) {
                $table->string('tax_receipts')->nullable();
                }
if (!Schema::hasColumn('sales', 'tax_certificate')) {
                $table->string('tax_certificate')->nullable();
                }
if (!Schema::hasColumn('sales', 'sewer_water_compliance')) {
                $table->string('sewer_water_compliance')->nullable();
                }
if (!Schema::hasColumn('sales', 'proposed_deed')) {
                $table->string('proposed_deed')->nullable();
                }
if (!Schema::hasColumn('sales', 'mortgage_commitment')) {
                $table->string('mortgage_commitment')->nullable();
                }
if (!Schema::hasColumn('sales', 'seach_taxes_deed')) {
                $table->string('seach_taxes_deed')->nullable();
                }
if (!Schema::hasColumn('sales', 'mortgage_payoff_info')) {
                $table->string('mortgage_payoff_info')->nullable();
                }
if (!Schema::hasColumn('sales', 'title_report_from_buyer')) {
                $table->string('title_report_from_buyer')->nullable();
                }
if (!Schema::hasColumn('sales', 'clsoing_docs_drafted')) {
                $table->string('clsoing_docs_drafted')->nullable();
                }
if (!Schema::hasColumn('sales', 'closing_statement')) {
                $table->string('closing_statement')->nullable();
                }
if (!Schema::hasColumn('sales', 'closing_statement_to_buyer')) {
                $table->string('closing_statement_to_buyer')->nullable();
                }
if (!Schema::hasColumn('sales', 'closing_date')) {
                $table->string('closing_date')->nullable();
                }
if (!Schema::hasColumn('sales', 'notes')) {
                $table->text('notes')->nullable();
                }
if (!Schema::hasColumn('sales', 'internal_notes')) {
                $table->text('internal_notes')->nullable();
                }
if (!Schema::hasColumn('sales', 'rates')) {
                $table->string('rates')->nullable();
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
        Schema::table('sales', function (Blueprint $table) {
            $table->dropColumn('search_update');
            $table->dropColumn('survey_update');
            $table->dropColumn('tax_receipts');
            $table->dropColumn('tax_certificate');
            $table->dropColumn('sewer_water_compliance');
            $table->dropColumn('proposed_deed');
            $table->dropColumn('mortgage_commitment');
            $table->dropColumn('seach_taxes_deed');
            $table->dropColumn('mortgage_payoff_info');
            $table->dropColumn('title_report_from_buyer');
            $table->dropColumn('clsoing_docs_drafted');
            $table->dropColumn('closing_statement');
            $table->dropColumn('closing_statement_to_buyer');
            $table->dropColumn('closing_date');
            $table->dropColumn('notes');
            $table->dropColumn('internal_notes');
            $table->dropColumn('rates');
            
        });

    }
}
