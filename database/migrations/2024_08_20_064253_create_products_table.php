<?php

use App\Models\Country;
use App\Models\Supplier;
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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fullname');
            $table->foreignIdFor(Country::class, 'country_id')->constrained();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Supplier::class, 'supplier_id')->constrained()->onDelete('cascade');
            $table->string('part_number');
            $table->string('description');
            $table->float('unit_price');
            $table->float('purchase_price');
            $table->float('sale_price');
            $table->string('hsn_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('suppliers');
    }
};
