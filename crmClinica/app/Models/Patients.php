<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasUlids;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'clinic_id',
        'nome',
        'cpf',
        'nascimento',
        'dados_clinicos',
    ];

    protected $casts = [ //converte automatico
        'nascimento' => 'date',
        'dados_clinicos' => 'array',
    ];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function contacts()
    {
        return $this->hasMany(Patients_contacts::class);
    }

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }
}
