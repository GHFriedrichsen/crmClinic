<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory, HasUlids;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'nome',
        'cnpj',
        'endereco',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'clinic_users')
            ->withPivot('clinic_role')
            ->withTimestamps();
    }

    public function patient()
    {
        return $this->belongsTo(Patients::class);
    }

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}
