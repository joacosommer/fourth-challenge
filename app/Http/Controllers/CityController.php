<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCity;
use App\Models\City;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    public function index()
    {
        return view('cities', [
            'cities' => City::query()
                ->withCount('arrivals')
                ->withCount('departures')
                ->paginate(6)->withQueryString()
        ]);
    }

    public function fetchcities()
    {
        $cities = City::all();
        return response()->json([
            'cities'=>$cities,
        ]);
    }


    public function store(Request $request) {
        dd($request->all());
        $validator = Validator::make($request->all(), [
            'name'=> 'required|unique:cities',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $city = new City;
            $city->name = $request->input('name');
            $city->save();
            return response()->json([
                'status'=>200,
                'message'=>'City Added Successfully.'
            ]);
        }

//        City::create([
//            'name'=>$request->input('name')
//        ]);
//        return response()->json([
//            'status'=>200,
//            'message'=>'City Added Successfully',
//        ]);
    }

    public function edit($id)
    {
        $city = City::find($id);
        if($city)
        {
            return response()->json([
                'status'=>200,
                'city'=> $city,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No City Found.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'=> 'required|unique:cities',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $city = City::find($id);
            if($city)
            {
                $city->name = $request->input('name');
                $city->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'City Updated Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No City Found.'
                ]);
            }

        }
    }

    public function destroy($id)
    {
        $city = City::find($id);
        if($city)
        {
            $city->delete();
            return response()->json([
                'status'=>200,
                'message'=>'City Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No City Found.'
            ]);
        }
    }
}
