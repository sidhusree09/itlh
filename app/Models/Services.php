<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'price',
        'location',
    ];
    
    protected $table = 'services';
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function image()
    {
        return $this->hasOne(Image::class);
    }
    
    public function getImage($service_id) 
    {
        $images = Image::select('path','alt')->where('ref_id', $service_id)
            ->get();
        if($images== null)
            return array('path'=>'default.jpg','alt'=>"");
        else        
            return $images;
    }
    
    public function getViews()
    {
        
    }

}
