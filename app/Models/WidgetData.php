<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WidgetData extends Model
{
    use HasFactory;
     
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'widget_id',
        'data',
        'is_completed'

    ];
    /**
     * Get the widget that owns the WidgetConfig
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function widget()
    {
        return $this->belongsTo(Widget::class);
    }
}
