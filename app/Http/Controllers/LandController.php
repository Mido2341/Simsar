<?php

namespace App\Http\Controllers;

use App\Models\Land;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lands=Land::with('user')->paginate();

        return view('land.index',compact('lands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('land.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data=$request->all();
        Validator::make($data,[
            'land_photo'=>['array','required'],
            'land_photo .*'=>['image'],
            'land_num'=>['required','integer'],
            'meter_price'=>['required','integer'],
            'land_area' =>['required','integer'],
            'land_address'=>['required','string'],
            'land_city'=>['required','string'],
            'land_description'=>['string','max:400']
        ])->validate();

        $data['user_id']=auth()->id();

        // $path=$request->file('land_photo')->store('public');
        // $path=str_replace('public','storage',$path);
        // $data['land_photo']=$path;

        $land=land::create($data);

        if ($request->hasFile('land_photo'))
            {
                foreach ($request->file('land_photo') as $photo)
                {
                    $land->addMedia($photo)->toMediaCollection('landimages');
                }
            }
        return redirect()->route('lands.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $land=Land::find($id);
        return view('land.show',compact('land'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Land $land)
    {
        return view('land.update',compact('land'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Land $land)
    {
        $data=$request->all();

        Validator::make($data,[
            'land_photo'=>['array','required'],
            'land_photo .*'=>['image'],
            'land_num'=>['required','integer'],
            'price_meter'=>['required','integer'],
            'land_area'=>['required','integer'],
            'land_address'=>['required'],
            'land_city'=>['required','string'],
            'land_description'=>['string','max:400']
        ])->validate();


        // if($request->hasFile('land_photo'))
        //  {
        //     $path=$request->file('land_photo')->store('public');
        //     $path=str_replace('public','storage',$path);
        //     $data['land_photo']=$path;
        //  }

        $data=
            [
                'land_num'=>$request->land_num,
                'price_meter'=>$request->price_meter,
                'land_area'=>$request->land_area,
                'rent_address'=>$request->rent_address,
                'rent_city'=>$request->rent_city,
                'rent_description'=>$request->rent_description,
            ];

            if ($request->hasFile('land_photo'))
            {
                foreach ($request->file('land_photo') as $photo)
                {
                    $land->addMedia($photo)->toMediaCollection('landimages');
                }
            }

            $land->update($data);

        return redirect()->route('lands.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $land=Land::find($id);
        $land->delete();
        return redirect()->route('lands.index');
    }
}
