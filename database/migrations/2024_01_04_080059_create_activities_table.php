<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('activities', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->string('name');
			$table->string('description');
			$table->decimal('cost', 8, 2);
			$table->string('status')->default('available');
			$table->bigInteger('quantity');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('activities');
	}
};
