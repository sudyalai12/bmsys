<?php

use App\Models\Contact;
use App\Models\Delivery;
use App\Models\DeliveryTerm;
use App\Models\FreightChargesTerm;
use App\Models\GstTerm;
use App\Models\HandlingChargesTerm;
use App\Models\PaymentTerm;
use App\Models\PnfChargesTerm;
use App\Models\PoPlaceTerm;
use App\Models\PriceBasicTerm;
use App\Models\PriceBasis;
use App\Models\Product;
use App\Models\Quote;
use App\Models\SpecialConditionsTerm;
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

        // Schema::create('special_conditions_terms', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('description');
        // });

        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Contact::class, 'contact_id')->constrained()->onDelete('cascade');
            $table->string('reference')->nullable();
            $table->date('due_date')->nullable()->default(now());
            $table->date('enquiry_date')->nullable()->default(now());
            $table->foreignIdFor(PriceBasicTerm::class, 'price_basic_term_id')->default(1);
            $table->foreignIdFor(PaymentTerm::class, 'payment_term_id')->default(1);
            $table->foreignIdFor(HandlingChargesTerm::class, 'handling_charges_term_id')->default(1);
            $table->foreignIdFor(GstTerm::class, 'gst_term_id')->default(3);
            $table->foreignIdFor(DeliveryTerm::class, 'delivery_term_id')->default(1);
            $table->foreignIdFor(PnfChargesTerm::class, 'pnf_charges_term_id')->default(1);
            $table->foreignIdFor(FreightChargesTerm::class, 'freight_charges_term_id')->default(1);
            $table->foreignIdFor(WarrantyTerm::class, 'warranty_term_id')->default(1);
            $table->foreignIdFor(ValidityQuoteTerm::class, 'validity_quote_term_id')->default(1);
            // $table->foreignIdFor(SpecialConditionsTerm::class, 'special_conditions_term_id')->default(1);
            $table->timestamps();
        });

        Schema::create('quote_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Quote::class, 'quote_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(Product::class, 'product_id')->constrained()->onDelete('cascade');
            $table->float('quantity')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote_items');
        Schema::dropIfExists('quotes');
        Schema::dropIfExists('price_basic_terms');
        Schema::dropIfExists('payment_terms');
        Schema::dropIfExists('handling_charges_terms');
        Schema::dropIfExists('gst_terms');
        Schema::dropIfExists('delivery_terms');
        Schema::dropIfExists('pnf_charges_terms');
        Schema::dropIfExists('freight_charges_terms');
        Schema::dropIfExists('warranty_terms');
        Schema::dropIfExists('validity_quote_terms');
    }
};
