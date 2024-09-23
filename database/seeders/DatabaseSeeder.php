<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\DeliveryTerm;
use App\Models\FreightChargesTerm;
use App\Models\GstTerm;
use App\Models\HandlingChargesTerm;
use App\Models\PaymentTerm;
use App\Models\PnfChargesTerm;
use App\Models\PriceBasicTerm;
use App\Models\State;
use App\Models\Tax;
use App\Models\User;
use App\Models\ValidityQuoteTerm;
use App\Models\WarrantyTerm;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('countries')->insert(Country::$countries);
        DB::table('states')->insert(State::$states);
        DB::table('taxes')->insert(Tax::$taxes);

        // Contact::factory(50)->create();
        // Contact::all()->each(function ($contact) {
        //     $contact->address_id = Address::all()->random()->id;
        //     $contact->customer_id = Customer::all()->random()->id;
        //     $contact->save();
        // });

        // Supplier::factory(10)->create();
        // Product::factory(200)->create();

        DB::table('price_basic_terms')->insert(PriceBasicTerm::$price_basic_terms);
        DB::table('payment_terms')->insert(PaymentTerm::$payment_terms);
        DB::table('handling_charges_terms')->insert(HandlingChargesTerm::$handling_charges_terms);
        DB::table('gst_terms')->insert(GstTerm::$gst_terms);
        DB::table('delivery_terms')->insert(DeliveryTerm::$delivery_terms);
        DB::table('pnf_charges_terms')->insert(PnfChargesTerm::$pnf_charges_terms);
        DB::table('freight_charges_terms')->insert(FreightChargesTerm::$freight_charges_terms);
        DB::table('warranty_terms')->insert(WarrantyTerm::$warranty_terms);
        DB::table('validity_quote_terms')->insert(ValidityQuoteTerm::$validity_quote_terms);

        // Quote::factory(10)->create();

        // Quote::all()->each(function ($quote) {
        //     $quote->generateReference();
        // });

        // QuoteItem::factory(100)->create();
        
        User::factory()->create([
            'name' => 'Neuvin',
            'email' => 'info@neuvin.com',
            'password' => 'Electronics@2024',
        ]);
    }
}
