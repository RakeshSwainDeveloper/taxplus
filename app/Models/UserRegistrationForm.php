<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRegistrationForm extends Model
{
    use HasFactory;

    // Table name as per your PostgreSQL schema
    protected $table = 'user_registration_form';

    // Explicitly set primary key type to integer (serial4)
    protected $primaryKey = 'id';
    public $incrementing = true;

    // Disable Laravel's default timestamps and use your custom ones
    public $timestamps = false;
    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';

    protected $fillable = [
        'user_id',
        'source_id',
        'total_price',
        'payment_status',
        'form_status',
        'payment_mode',
        'document_method',
    ];

    protected $casts = [
        'payment_status' => 'boolean',
        'total_price' => 'float',
    ];

    // Define relationship with CustomSupport
    public function plan()
    {
        return $this->belongsTo(CustomSupport::class, 'source_id', 'id');
    }
}