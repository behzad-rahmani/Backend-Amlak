<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function property(PropertyRequest $propertyRequest)
    {
        $property= Property::create($propertyRequest->all());
        if ($propertyRequest->hasFile('picture'))
        {
            $pictureUrl =  Storage::putFile('/amlak',$propertyRequest->picture);
            $property->update([
                'url_picture'=>$pictureUrl
            ]);
        }
        return response()->json([
           "message"=> "ملک یا املاک در سامانه با موفقیت درج گردید",
            "data" => new PropertyResource($property)
        ]);
    }

    public function show($id)
    {
        $property=Property::find($id);
    if  ($property== null)
    {
     return response()->json(
         [
             'message'=> "املاک مورد نظر یافت نشد",
         ]
     ,404);
    }
    else
    {
        return response()->json([
            "message" => "املاک مورد نظر یافت شد",
            "data" => new PropertyResource($property)
        ]);
    }
    }

    public function showlist()
    {
        $propertys=Property::all();
        if  ($propertys== null)
        {
            return response()->json(
                [
                    'message'=> "متاسفانه هنوز خانه اضافه نشده است",
                ]
                ,404);
        }
        else
        {
            return response()->json([
                "message" => "لیست خانه ها با موفقیت دریافت شد",
                "data" => PropertyResource::collection($propertys)
            ]);
        }

    }
}
