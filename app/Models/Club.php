<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StudentCoordinator;

class Club extends Model
{
 protected $fillable = [
    'club_name',
    'logo',
    'introduction',
    'mission',
    'staff_coordinator_name',
    'staff_coordinator_email',
    'staff_coordinator_photo',
    'year_started',
    'department_id',
    'category'
];


    public function studentCoordinators()
    {
        return $this->hasMany(StudentCoordinator::class);
    }
    public function events()
{
    return $this->hasMany(\App\Models\Event::class);
}

}
