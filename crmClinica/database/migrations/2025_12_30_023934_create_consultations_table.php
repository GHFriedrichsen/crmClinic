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
            $table->id();
            $table->foreignId('clinic_id')
                ->constrained('clinics')
                ->cascadeOnDelete();
            $table->foreignId('patient_id') //quem vai ser consultado
                ->constrained('patients')
                ->cascadeOnDelete();
            $table->foreignId('doctor_usuario_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('scheduled_by_contact_id') //quem marcou
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
