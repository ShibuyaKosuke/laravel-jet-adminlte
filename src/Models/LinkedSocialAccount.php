<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class LinkedSocialAccount
 * @package ShibuyaKosuke\LaravelJetAdminlte\Models
 * @property int $id
 * @property int $user_id
 * @property string $provider_name
 * @property string $provider_id
 * @property string $avatar
 * @property User $user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedSocialAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedSocialAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedSocialAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedSocialAccount whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedSocialAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedSocialAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedSocialAccount whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedSocialAccount whereProviderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedSocialAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LinkedSocialAccount whereUserId($value)
 * @mixin \Eloquent
 */
class LinkedSocialAccount extends Model
{
    use HasFactory;

    /**
     * @var string
     */
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
        $this->table = config('jet_adminlte.social-account-table', 'linked_social_accounts');

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
