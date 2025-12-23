<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserItrDocument extends Model
{
    protected $table = 'user_itr_documents';

    protected $fillable = [
        'user_id',
        'application_id',
        'document_name',
        'document_path',
    ];

    public $timestamps = false; // because only created_at exists
}
