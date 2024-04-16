<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'email',
    ];

    /**
     * Define a many-to-many relationship between users and documents.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function documents(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(CDocument::class, 'c_users_documents', 'user_id', 'document_id');
    }
}
