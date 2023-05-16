<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    protected $fillable = [
        'user_id',
        'notifiable_id',
        'type',
        'notifiable_type',
        'read_at',
        'caused_by_user_id'
    ];

    protected $casts = [
        'read_at' => 'boolean',
    ];

    public function notifiable()
    {
        return $this->morphTo('notifiable');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function causedByUser()
    {
    return $this->belongsTo(User::class, 'caused_by_user_id');
    }

    public function markAsRead()
    {
        $this->read_at = true;
        $this->save();
    }
}
