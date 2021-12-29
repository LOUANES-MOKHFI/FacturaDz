<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesAttachementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices_attachements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name',999);
            $table->string('invoice_number',50);
            $table->integer('user_id');
            $table->unsignedBigInteger('invoices_id')->nullable();
            $table->foreign('invoices_id')->references('id')->on('invoices')->onDelete('cascade');

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
        Schema::dropIfExists('invoices_attachements');
    }
}
