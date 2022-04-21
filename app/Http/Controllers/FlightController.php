<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FlightController extends Controller
{
    public function index()
    {
        //return flights with airline, origin and destination with pagination
        $flights = Flight::with('airline', 'origin', 'destination')->paginate(10);
        return response()->json($flights);
    }

    public function store(Request $request)
    {
        $json = $request->all();
        $validator = Validator::make($json, [
            'origin' => 'required|exists:cities,id',
            'airline' => 'required|exists:airlines,id',
            'destination' => 'required|exists:cities,id',
            'departureDate' => 'required|date',
            'arrivalDate' => 'required|date',

        ]);

        //convert departureDate and arrivalDate to dateTime
        $json['departureDate'] = date('Y-m-d H:i:s', strtotime($json['departureDate']));
        $json['arrivalDate'] = date('Y-m-d H:i:s', strtotime($json['arrivalDate']));

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $flight = new Flight();
            $flight->airline_id = $json['airline'];
            $flight->origin_id = $json['origin'];
            $flight->destination_id = $json['destination'];
            $flight->departureDate = $json['departureDate'];
            $flight->arrivalDate = $json['arrivalDate'];
            $flight->save();

            $flightToSend = Flight::with('airline', 'origin', 'destination')->find($flight->id);
            return response()->json([
                'status' => 200,
                'message' => 'Flight Added Successfully.',
                'flight' => $flightToSend
            ]);
        }
    }




}
