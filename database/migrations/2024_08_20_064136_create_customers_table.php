<?php

use App\Models\Address;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Department;
use App\Models\Tax;
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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('currency');
            $table->string('phone');
            $table->string('code');
            $table->integer('number');
        });

        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->string('type');
        });

        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->foreignIdFor(Country::class, 'country_id')->constrained()->default(121);
            $table->timestamps();
        });

        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Customer::class, 'customer_id')->constrained()->onDelete('cascade');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('pincode');
            $table->string('state');
            $table->foreignIdFor(Country::class, 'country_id')->constrained();
            $table->timestamps();
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->foreignIdFor(Department::class, 'department_id')->constrained();
            $table->foreignIdFor(Address::class, 'address_id')->constrained()->onDelete('cascade');
            $table->string('phone');
            $table->string('mobile');
            $table->foreignIdFor(Tax::class, 'tax_id')->constrained();
            $table->string('gstn');
            $table->string('pan');
            $table->string('state_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('taxes');
        Schema::dropIfExists('countries');
    }
};
