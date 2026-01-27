<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Patients_contacts extends Model
{
    use HasUlids;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'patient_id',
        'name',
        'whatsApp',
        'email',
        'relationship',
        'is_primary',
    ];

    public function patient()
    {
        return $this->belongsTo(Patients::class);
    }

    public function scheduleByContacts()
    {
        return $this->hasMany(Consultation::class);
    }
}
