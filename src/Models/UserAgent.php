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
        'remote_ip',
        'device',
        'platform',
        'platform_version',
        'browser',
        'browser_version',
        'updated_at',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
