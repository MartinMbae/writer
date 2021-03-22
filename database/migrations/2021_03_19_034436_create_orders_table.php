<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('source_id');
            $table->string('paper_type');
            $table->string('subject');
            $table->string('paper_level');
            $table->string('writing_format');
            $table->integer('page_count');
            $table->integer('slide_count');
            $table->integer('source_count');
            $table->integer('days');
            $table->integer('hours');
            $table->string('amount');
            $table->string('order_no');
            $table->string('topic');
            $table->string('language');
            $table->string('spacing');
            $table->string('instructions');
            $table->string('pending_notes');
            $table->string('random_id');
            $table->string('notes');
            $table->enum("status",array(0,1,2,3,4,5,6)); //0 -> New Orders, //1 -> Awarded Orders, //2 -> Under Revision  //3->Completed Orders, //4->Rejected Orders, //5 -> Cancelled Orders, // 6 -> Paid Orders
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
