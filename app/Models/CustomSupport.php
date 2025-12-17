<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomSupport extends Model
{
    use HasFactory;

    // Table name as per your PostgreSQL schema
    protected $table = 'custom_support';

    // Explicitly set primary key type to integer (serial4)
    protected $primaryKey = 'id';
    public $incrementing = true;

    // Disable Laravel's default timestamps and use your custom ones
    public $timestamps = false;
    const CREATED_AT = 'created_time';
    const UPDATED_AT = 'updated_time';

    protected $fillable = [
        'source_type',
        'income_source',
        'price',
        'status',
        'document_list',
        // 'created_time',
        // 'updated_time',
    ];

    // Cast price to float for easier use
    protected $casts = [
        'price' => 'float',
        'status' => 'boolean',
        'document_list' => 'array',
    ];
}
