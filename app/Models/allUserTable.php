<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class allUserTable extends Model
{
    use HasFactory;
    public function role()
    {
        return $this->hasOne(Role::class);
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function jobPostings()
    {
        return $this->hasMany(JobPosting::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}

class Role extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

class JobApplication extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobPosting()
    {
        return $this->belongsTo(JobPosting::class);
    }
}

class JobPosting extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }
}

class Review extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

