<?php

use App\Models\Contact;
use App\Models\Country;
use App\Models\DeliveryTerm;
use App\Models\Enquiry;
use App\Models\FreightChargesTerm;
use App\Models\GstTerm;
use App\Models\HandlingChargesTerm;
use App\Models\PaymentTerm;
use App\Models\PnfChargesTerm;
use App\Models\PoConditionsTerm;
use App\Models\PriceBasicTerm;
use App\Models\Product;
use App\Models\Quote;
use App\Models\SpecialConditionsTerm;
use App\Models\State;
use App\Models\Tax;
use App\Models\ValidityQuoteTerm;
use App\Models\WarrantyTerm;
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
        Schema::create('price_basic_terms', function (Blueprint $table) {
            $table->id();
            $table->string('description');
        });

        Schema::create('payment_terms', function (Blueprint $table) {
            $table->id();
            $table->string('description');
        });

        Schema::create('handling_charges_terms', function (Blueprint $table) {
            $table->id();
            $table->string('description');
        });

        Schema::create('gst_terms', function (Blueprint $table) {
            $table->id();
            $table->string('description');
        });

        Schema::create('delivery_terms', function (Blueprint $table) {
            $table->id();
            $table->string('description');
        });

        Schema::create('pnf_charges_terms', function (Blueprint $table) {
            $table->id();
            $table->string('description');
        });

        Schema::create('freight_charges_terms', function (Blueprint $table) {
            $table->id();
            $table->string('description');
        });

        Schema::create('warranty_terms', function (Blueprint $table) {
            $table->id();
            $table->string('description');
        });

        Schema::create('validity_quote_terms', function (Blueprint $table) {
            $table->id();
            $table->string('description');
        });

        Schema::create('po_conditions_terms', function (Blueprint $table) {
            $table->id();
            $table->string('description');
        });

        Schema::create('special_conditions_terms', function (Blueprint $table) {
            $table->id();
            $table->string('description');
        });

        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->default("Email Dated: " . now()->format('d-m-Y'));
            $table->date('date')->default(now());
            $table->date('due_date')->default(now());
            $table->foreignIdFor(Contact::class, 'contact_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('quotes', function (Blueprint $table) {
            $table->id();

            // Enquiry Information
            $table->foreignIdFor(Enquiry::class, 'enquiry_id')->constrained()->onDelete('cascade');
            $table->string('reference');
            $table->date('date')->default(now());
            $table->boolean('show_price')->default(true);

            // Terms Information
            $table->string('price_basic_term')->default(PriceBasicTerm::$price_basic_terms[0]['description']);
            $table->string('payment_term')->default(PaymentTerm::$payment_terms[0]['description']);
            $table->string('handling_charges_term')->default(HandlingChargesTerm::$handling_charges_terms[0]['description']);
            $table->string('gst_term')->default(GstTerm::$gst_terms[2]['description']);
            $table->string('delivery_term')->default(DeliveryTerm::$delivery_terms[0]['description']);
            $table->string('pnf_charges_term')->default(PnfChargesTerm::$pnf_charges_terms[0]['description']);
            $table->string('freight_charges_term')->default(FreightChargesTerm::$freight_charges_terms[0]['description']);
            $table->string('warranty_term')->default(WarrantyTerm::$warranty_terms[0]['description']);
            $table->string('validity_quote_term')->default(ValidityQuoteTerm::$validity_quote_terms[0]['description']);
            $table->string('po_conditions_term')->default(PoConditionsTerm::$po_conditions_terms[0]['description']);
            $table->string('special_conditions_term')->default(SpecialConditionsTerm::$special_conditions_terms[0]['description']);

            // Customer Information
            $table->string('customer_name')->nullable();
            $table->string('nickname')->nullable();
            $table->foreignIdFor(Tax::class, 'tax_id')->default(1)->constrained();
            $table->string('gstn')->nullable();
            $table->string('pan')->nullable();
            $table->string('state_code')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode')->nullable();
            $table->foreignIdFor(State::class, 'state_id')->default(4021)->constrained();
            $table->foreignIdFor(Country::class, 'country_id')->default(101)->constrained();
            $table->string('contact_name')->nullable();
            $table->string('email')->nullable();
            $table->string('department')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();

            $table->timestamps();
        });

        Schema::create('quote_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Quote::class, 'quote_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(Product::class, 'product_id')->constrained()->onDelete('cascade');
            $table->integer('quantity')->default(1);

            // Product Information
            $table->string('name')->nullable();
            $table->string('fullname')->nullable();
            $table->foreignIdFor(Country::class, 'country_id')->default(101)->constrained();
            $table->string('part_number')->nullable();
            $table->string('description')->nullable();
            $table->float('unit_price')->nullable();
            $table->float('purchase_price')->nullable();
            $table->float('sale_price')->nullable();
            $table->string('hsn_code')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_basic_terms');
        Schema::dropIfExists('payment_terms');
        Schema::dropIfExists('handling_charges_terms');
        Schema::dropIfExists('gst_terms');
        Schema::dropIfExists('delivery_terms');
        Schema::dropIfExists('pnf_charges_terms');
        Schema::dropIfExists('freight_charges_terms');
        Schema::dropIfExists('warranty_terms');
        Schema::dropIfExists('validity_quote_terms');
        Schema::dropIfExists('po_conditions_terms');
        Schema::dropIfExists('special_conditions_terms');
        Schema::dropIfExists('quotes');
        Schema::dropIfExists('quote_items');
        Schema::dropIfExists('enquiries');
    }
};
