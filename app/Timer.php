<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int    $id
 * @property string $name
 * @property bool   $active
 * @property int    $time
 * @property int    $user_id
 * @property User   $user
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $stopped_at
 */
class Timer extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
        'stopped_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'bool',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Stop the active timer. If this timer is not active this method does nothing.
     */
    public function stop()
    {
        if ($this->active !== true) {
            return;
        }

        $this->active     = false;
        $this->stopped_at = Carbon::now();
        $this->time       = $this->stopped_at->diffInRealSeconds($this->created_at);
    }
}
