<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseInstallment extends Model
{
    use HasFactory;
    protected $dates = ['payment_date'];

    protected $fillable = ['user_id', 'payment_date', 'amount', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
