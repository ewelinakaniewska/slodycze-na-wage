<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Supplier;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->string('type', 25);
            $table->text('ingredients');
            $table->decimal('price');
            $table->integer('stock');
            $table->decimal('rating');
            $table->foreignIdFor(Supplier::class)->constrained()->onDelete('cascade');
        });
        DB::statement("ALTER TABLE candies ADD img LONGBLOB");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candies');
    }
};
