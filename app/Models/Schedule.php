<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'start_time',
        'end_time',
        'target_service_id',
    ];
    
    protected $table = 'schedule';
    
    public function service()
    {
        return $this->belongsTo(Services::class);
    }
}
