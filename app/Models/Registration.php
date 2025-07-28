<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registrations';
    protected $fillable = [
        'name',
        'roll_no',
        'email',
        'gender',
        'department',
    ];
    public function clubs()
{
    return $this->belongsToMany(Club::class, 'club_registration', 'registration_id', 'club_id');
}

}
