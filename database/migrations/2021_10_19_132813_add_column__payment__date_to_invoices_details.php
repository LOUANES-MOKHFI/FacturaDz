<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPaymentDateToInvoicesDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices_details', function (Blueprint $table) {
            $table->string('Payment_Date')->nullable()->after('value_status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices_details', function (Blueprint $table) {
            $table->dropColumn('Payment_Date');
        });
    }
}
