<?php

namespace App\Models;
use App\Models\Apartment;
use App\Models\User;
use App\Models\Batch;
use App\Enums\BatchStatus;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $casts = [
        'date'  => 'date:Y-m-d',
        'start_date' => 'date:Y-m-d',
        'end_date' => 'date:Y-m-d',
    ];
    public $additional_attributes = ['contract_name'];
    public $disable_export = true;

    public function apartment()
    {
        return $this->hasOne(Apartment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function batches(){
        return $this->hasMany(Batch::class);
    }

    public function scopeRemainingPrice($query)
    {
        echo "here";
        return $query->batches->status(BatchStatus::unpaid);
    }

    public function getDateAttribute($value) {
       return Carbon::parse($value)->toDateString();
    }

    public function getStartDateAttribute($value) {
       return Carbon::parse($value)->toDateString();
    }

    public function getEndDateAttribute($value) {
       return Carbon::parse($value)->toDateString();
    }

    public function getContractNameAttribute()
    {
      return "{$this->user->name} {$this->start_date}";
    }
}
