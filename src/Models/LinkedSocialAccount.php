<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * LinkedSocialAccount
 * @property User $user
 */
class LinkedSocialAccount extends Model
{
    use HasFactory;

    protected $table;

    /**
     * @var string[]
     */
    protected $fillable = ['provider_name', 'provider_id', 'avatar'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->table = config('jet_adminlte.social-account-table');

        parent::__construct($attributes);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
