<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAgent extends Model
{
    use HasFactory;
    use HasTimestamps;

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'user_agent',
        'hash',
        'route_name',
        'remote_ip',
        'device_type',
        'device',
        'platform',
        'platform_version',
        'browser',
        'browser_version',
        'updated_at',
    ];

    /**
     * @return string
     */
    public function getIconAttribute(): string
    {
        switch ($this->device_type) {
            case 'mobile':
                return 'fas fa-fw fa-mobile-alt fa-2x';
            case 'tablet':
                return 'fas fa-fw fa-tablet-alt fa-2x';
            default:
                return 'fas fa-fw fa-laptop fa-2x';
        }
    }

    /**
     * @param string $value
     * @return string|void
     */
    public function getRouteNameAttribute($value)
    {
        switch ($value) {
            case 'login.store':
                return 'Login by ID and Password';
            case 'two-factor.store':
                return 'Two Factor login';
            case 'oauth.callback':
                return 'Oauth2 login';
            case 'logout':
                return 'Logout';
        }
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
