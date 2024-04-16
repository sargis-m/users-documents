<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content',
    ];

    /**
     * Retrieve the users associated with the current document.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(CUser::class, 'c_users_documents', 'document_id', 'user_id');
    }
}
