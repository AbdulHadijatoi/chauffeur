<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServicesCategory;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index($services_category_id){
        $services_category = ServicesCategory::with(['services','services.vehicle.specs', 'services.vehicle.images','services.serviceType'])->find($services_category_id);
        // dd($services_category->services->toArray());
        // use compact instead of array
        return view('services', compact('services_category'));
    }

    public function service_details($service_id, $service_name){
        $service = Service::with(['vehicle.specs', 'vehicle.images','serviceType'])->where('id', $service_id)->first();

        return view('service_details', compact('service'));
    }
}
