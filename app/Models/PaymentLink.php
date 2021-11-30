<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLink extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'code',
        'mode_type',
        'currency',
        'amount',
        'description',
        'policy_settings',
        'policy_settings->email_required',
        'policy_settings->phone_number_required',
        'policy_settings->address_required',
        'policy_settings->name_required',
        'finished_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'policy_settings'   => 'array',
        'finished_at'       => 'datetime',
    ];

    /**
     * Get the user that owns the PaymentLink
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
