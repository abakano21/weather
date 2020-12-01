<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $link;

    protected $table = 'invoices';

    protected $fillable = [
        'school_name',
        'description',
        'amount',
        'is_paid',
        'user_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function linkAttribute()
    {
        return '/invoice-link';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
