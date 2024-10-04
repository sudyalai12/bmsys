<?php

use App\Models\Address;
use App\Models\Country;
use App\Models\Customer;
use App\Models\State;
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
            $table->string('iso3');
            $table->string('numeric_code');
            $table->string('phone_code');
            $table->string('currency');
            $table->string('currency_name');
            $table->string('currency_symbol');
        });
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Country::class, 'country_id')->constrained();
            $table->string('country_name');
            $table->string('state_code');
        });
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->string('type');
        });
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('pincode');
            $table->foreignIdFor(State::class, 'state_id')->constrained();
            $table->foreignIdFor(Country::class, 'country_id')->constrained();
            $table->timestamps();
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nickname');
            $table->foreignIdFor(Address::class, 'address_id')->constrained();
            $table->foreignIdFor(Tax::class, 'tax_id')->constrained();
            $table->string('gstn');
            $table->string('pan');
            $table->string('state_code');
            $table->timestamps();
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Customer::class, 'customer_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('department');
            $table->string('phone');
            $table->string('mobile');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('taxes');
        Schema::dropIfExists('states');
        Schema::dropIfExists('countries');
    }
};
