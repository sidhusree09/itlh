<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Bookings extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date',
        'time',
        'message',
        'service_id',
    ];
    
    protected $table = 'bookings';
    
    public function service()
    {
        return $this->belongsTo(Services::class);
    }
    
    public function getDashboardBookings()
    {
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();
        $bookings = $this->leftjoin('services','bookings.service_id','=','services.id')
                    ->where('services.user_id',auth()->user()->id)
                    ->whereBetween('bookings.created_at',[$start,$end])->count('bookings.id');
        return $bookings;                    
    }
    
    public function getTotalBookings()
    {
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();
        $totalPrice = $this->leftjoin('services','bookings.service_id','=','services.id')
                    ->where('services.user_id',auth()->user()->id)
                    ->whereBetween('bookings.created_at',[$start,$end])->sum('services.price');
        return $totalPrice;    
    }
}
