<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWidgetConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widget_configs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('widget_id')->nullable()->default(0);
            $table->string('text')->nullable();
            $table->string('validation')->nullable();
            $table->string('validation_message')->nullable();
            $table->string('type')->nullable();
            $table->text('value')->nullable();
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
        Schema::dropIfExists('widget_configs');
    }
}
