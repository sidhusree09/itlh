<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Services;
use App\Models\Category;
use App\Models\Image;
use App\Models\ServiceViews;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Services::all();
        return view('services.index', compact('services'));
    }
    
    public function all()
    {
        $services = Services::all();
        return view('services.all', compact('services'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) { 
            
            // Get the uploaded file and generate a unique filename
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            
            // Move the uploaded file to a directory
            $image->move(public_path('uploads'), $filename);
                                   
            $service = new Services;
            $service->title = $request->name;
            $service->description = $request->description;
            $service->price = $request->price;
            $service->category_id = $request->category_id;
            $service->location = $request->location;
            $service->user_id = Auth::id();
            $service->save();
            
            // Save image details in database
            $image = new Image;
            $image->path = $filename;
            $image->services_id = $service->id;
            $image->alt = $request->image_alt;
            $image->type=1; // service type
            $image->save();
    
            return redirect()->route('services.index');
            
         }else{
            return back()->with('error', 'Please choose a file to upload.');            
         }   
    }

    public function edit(Services $service)
    {
        $categories = Category::all();
        return view('services.edit', compact('service','categories'));
    }

    public function update(Request $request, Services $service)
    {
        $service_image = Image::where('services_id',$request->id)->first();
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('uploads'), $filename);
            // update image path       
            $old_image = $service_image->path;           
            $service_image->path = $filename;          
            //delete old image
            \Storage::delete(public_path('uploads').$old_image);
        }
        
        $service_image->alt=$request->image_alt;
        $service_image->save();
        
        $service->title = $request->title;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->category_id = $request->category_id;
        $service->location = $request->location;
        $service->user_id = auth()->user()->id;
        $service->save();

        return redirect()->route('services.index');
    }

    public function destroy(Services $service)
    {
        $service->delete();
        return redirect()->route('services.index');
    }
    
    public function show(Services $service)
    {
        // increment counter based on day, month, year 
        $serviceViews  = new ServiceViews;
        $serviceViews->incrementViews($service->id);    
        return view('services.show', compact('service'));
    }
    
}

?>