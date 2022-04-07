<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AirlineController extends Controller
{
    public function index()
    {
        return view('airlines', [
            'airlines' => Airline::query()
                ->withCount('flights')
//                ->paginate(6)->withQueryString()
        ]);
    }

    public function fetchairlines()
    {
        $airlines = Airline::all();
        return response()->json([
            'airlines'=>$airlines,
        ]);
    }

    public function store(Request $request)
    {
        $json = $request->all();
        $validator = Validator::make($json[0], [
            'name' => 'required|unique:airlines',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $airline = new Airline();
            $airline->name = $json[0]['name'];
            $airline->description = $json[1]['airlineDescription'];
            $airline->save();
            $citiesId = array();
            for ($i = 2; $i < count($json); $i++){
                $city = City::where('name', $json[$i]['city'])->first();
                $citiesId[] = $city->id;
            }
            $airline->cities()->sync($citiesId);
            return response()->json([
                'status' => 200,
                'message' => 'Airline Added Successfully.'
            ]);
        }
    }

    public function edit($id)
    {
        $airline = Airline::find($id);
        if($airline)
        {
            return response()->json([
                'status'=>200,
                'airline'=> $airline,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Airline Found.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        $json = $request->all();
        $validator = Validator::make($json[0], [
            'name'=> 'required',
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
            $airline = Airline::find($id);
            if($airline)
            {
                $airline->name = $json[0]['name'];
                $airline->description = $json[1]['airlineDescription'];
                $airline->update();
                $citiesId = array();
                for ($i = 2; $i < count($json); $i++){
                    $city = City::where('name', $json[$i]['city'])->first();
                    $citiesId[] = $city->id;
                }
                $airline->cities()->sync($citiesId);
                return response()->json([
                    'status'=>200,
                    'message'=>'Airline Updated Successfully.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No Airline Found.'
                ]);
            }

        }
    }

    public function destroy($id)
    {
        $airline = Airline::find($id);
        if($airline)
        {
            $airline->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Airline Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Airline Found.'
            ]);
        }
    }
}
