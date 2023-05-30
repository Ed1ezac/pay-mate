<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('organization_id');
            $table->enum('type', ['fee', 'charge'])->default('fee');
            $table->decimal('principal', $precision = 12, $scale = 2)->nullable();
            $table->boolean('accrues')->deafault(0);
            $table->string('accrues_every')->nullable();
            $table->datetime('due_at')->nullable();
            $table->decimal('accrues_by', $precision = 9, $scale = 2)->nullable();
            $table->boolean('recurs')->default(0);
            $table->string('recurs_every')->nullable();
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
        Schema::dropIfExists('payables');
    }
}
