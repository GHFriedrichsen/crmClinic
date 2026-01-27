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
        Schema::create('consultations', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('clinic_id')
                ->constrained('clinics')
                ->cascadeOnDelete();
            $table->foreignUlid('patient_id') //quem vai ser consultado
                ->constrained('patients')
                ->cascadeOnDelete();
            $table->foreignUlid('doctor_user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignUlid('scheduled_by_contact_id') //quem marcou
                ->constrained('patients_contacts')
                ->cascadeOnDelete();
            $table->dateTime('start_at', precision: 0);
            $table->dateTime('end_at', precision: 0);
            $table->enum('status',['Concluido', 'Cancelado', 'Remarcado', 'NaoVeio']);
            $table->text('observacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
