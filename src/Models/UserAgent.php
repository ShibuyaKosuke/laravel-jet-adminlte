<?php

namespace ShibuyaKosuke\LaravelJetAdminlte\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use ShibuyaKosuke\LaravelJetAdminlte\Events\LoginEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\LogoutEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\PasswordChangeEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\SocialAccountLoginEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\SocialAccountRegisterEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\TwoFactorAuthEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\TwoFactorRegisterEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Events\TwoFactorUnRegisterEvent;
use ShibuyaKosuke\LaravelJetAdminlte\Listeners\SocialAccountDetachedListener;

/**
 * Class UserAgent
 * @package ShibuyaKosuke\LaravelJetAdminlte\Models
 * @property int $id
 * @property int $user_id
 * @property string $user_agent
 * @property string $hash
 * @property string $event
 * @property string $remote_ip
 * @property string $device_type
 * @property string $device
 * @property string $platform
 * @property string $platform_version
 * @property string $browser
 * @property string $browser_version
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $icon
 * @property User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserAgent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAgent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAgent query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAgent whereBrowser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAgent whereBrowserVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAgent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAgent whereDevice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAgent whereDeviceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAgent whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAgent whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAgent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAgent wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAgent wherePlatformVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAgent whereRemoteIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAgent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAgent whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAgent whereUserAgent($value)
 * @mixin \Eloquent
 */
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
        'event',
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
    public function getEventAttribute($value)
    {
        switch ($value) {
            case LoginEvent::class:
                return 'Login by ID and Password';
            case LogoutEvent::class:
                return 'Logout';
            case PasswordChangeEvent::class:
                return 'Change password';
            case TwoFactorAuthEvent::class:
                return 'Two Factor login';
            case TwoFactorRegisterEvent::class:
                return 'Two Factor attached';
            case TwoFactorUnRegisterEvent::class:
                return 'Two Factor detached';
            case SocialAccountLoginEvent::class:
                return 'Social login';
            case SocialAccountRegisterEvent::class:
                return 'Oauth2 registered';
            case SocialAccountDetachedListener::class:
                return 'Oauth2 detached';
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
