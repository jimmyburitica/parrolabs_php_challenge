<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'customer_id',
        'address',
        'city',
        'state',
        'zip',
        'country',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
