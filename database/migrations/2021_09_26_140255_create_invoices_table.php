<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid');
            $table->string('invoice_number');
            $table->date('invoice_date');
            $table->date('due_date');
            $table->string('product');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->decimal('Amount_collection',8,2)->nullable();
            $table->decimal('Amount_Commission',8,2);
            $table->decimal('discount');
            $table->decimal('Value_VAT',8,2);
            $table->string('Rate_vat',999);
            $table->decimal('total',8,2);
            $table->string('status',50);
            $table->integer('value_status');
            $table->text('note')->nullable();
            $table->date('Payment_Date')->nullable();
            //$table->string('user');
            $table->softDeletes();
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
        Schema::dropIfExists('invoices');
    }
}
