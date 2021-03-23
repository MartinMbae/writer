<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id',4);
            $table->string('user_id',4);
            $table->enum("status",array(0,1,2,3,4)); //0 -> Awarded, //1 ->  Under Revision  //2->Completed Orders, //3->Rejected Orders, //4 ->  Paid Orders
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
        Schema::dropIfExists('assigned_orders');
    }
}
