<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LinkedSocialAccount extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['provider_name', 'provider_id', 'avatar'];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
