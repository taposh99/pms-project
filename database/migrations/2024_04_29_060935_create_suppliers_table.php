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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_category_id')->constrained('supplier_categories')->onDelete('cascade');
            $table->string('supplier_name');
            $table->string('supplier_code')->required();
            $table->string('contact_person')->nullable();
            $table->string('company_name')->nullable();
            $table->string('currency')->nullable();
            $table->text('deferred_payment_terms')->nullable();
            $table->string('area')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('payment_terms')->nullable();
            $table->foreignId('division_id')->nullable()->constrained('divisions')->onDelete('cascade');
            $table->foreignId('district_id')->nullable()->constrained('districts')->onDelete('cascade');
            $table->foreignId('country_id')->nullable()->constrained('countries')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
