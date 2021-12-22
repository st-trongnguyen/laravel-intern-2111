<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->text('description')->nullable(false);
            $table->enum('type',[1,2,3,4,5,6,7,8,9,10])->nullable(false);
            $table->enum('status',[1,2,3,4,5,6,7,8,9,10])->nullable(false);
            $table->date('start_date')->nullable(false);
            $table->date('due_date')->nullable(false);
            $table->unsignedBigInteger('assignee');
            $table->float('estimate')->nullable(false);
            $table->float('actual')->nullable(false);
            $table->foreign('assignee')->references('id')->on('users');
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
        Schema::dropIfExists('tasks');
    }
}
