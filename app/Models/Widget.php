<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'uuid',
        'user_id',
        'is_active',
    ];

    /**
     * Get the user that owns the Widget
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the WidgetConfig for the Widget
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function WidgetConfig(): HasMany
    {
        return $this->hasMany(WidgetConfig::class);
    }

    /**
     * Get all of the widgetData for the Widget
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function widgetData(): HasMany
    {
        return $this->hasMany(widgetData::class);
    }
}
