<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ServiceViews extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'category_id',
        'title',
        'description',
        'price',
        'location',
    ];
    
    protected $table = 'servicesViews';
    
    public function incrementViews($service_id)
    {    
        $serviceViews = self::where('service_id', $service_id)->first();
        
        if ($serviceViews) {
            $serviceViews->increment('view');
        }else{
            $serviceViews = new self;
            $serviceViews->view=1;
        }
           
         $recordData = [
            'service_id' => $service_id,
            'view' => $serviceViews->view, //$this->increment('view'),
            'day' =>  Carbon::now()->day,
            'month' =>  Carbon::now()->month,
            'year' =>  Carbon::now()->year,
        ];
        
         $criteria = [
            'service_id' => $service_id,
            'day' =>  Carbon::now()->day,
            'month' =>  Carbon::now()->month,
            'year' =>  Carbon::now()->year, 
        ];
        
        $this->updateOrInsert($criteria, $recordData);        
        
    }
    
    public function getMonthViews()
    {
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $totalViews = self::leftjoin('services','servicesViews.service_id','=','services.id')
                    ->where('services.user_id',auth()->user()->id)
                    ->where('servicesViews.month',$month)
                    ->where('servicesViews.year',$year)
                    ->sum('servicesViews.view');
                    
        return $totalViews;  
    }
}
