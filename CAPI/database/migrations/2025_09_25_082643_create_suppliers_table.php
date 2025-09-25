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

            // Step 1: General Supplier Information
            $table->enum('vendor_type', ['Local', 'International']); // 1.1
            $table->string('legal_name'); // 1.2
            $table->string('address_street'); // 1.3
            $table->string('address_line2')->nullable();
            $table->string('address_line3')->nullable();
            $table->string('city'); 
            $table->string('postal_code'); 
            $table->string('country'); 
            $table->string('organization_type'); // 1.4
            $table->string('company_profile')->nullable(); // 1.5 file path

            // Step 2: Primary Supplier Contact
            $table->string('contact_first_name'); // 2.1
            $table->string('contact_last_name'); // 2.2
            $table->string('contact_email'); // 2.3
            $table->string('contact_mobile'); // 2.4

            // Step 3: Additional Information
            $table->string('company_cr')->nullable(); // 3.1
            $table->string('invitation_number')->nullable(); // 3.4
            $table->boolean('previous_business')->nullable(); // 3.5

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
