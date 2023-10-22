<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rents=Rent::with('user')->paginate();
        return view('rent.index',compact('rents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rent.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->all();
        Validator::make($data,[
            'rent_photo'=>['array','required'],
            'rent_photo .*'=>['image'],
            'rent_num'=>['required','integer'],
            'rent_price'=>['required','integer'],
            'rent_address'=>['required','string'],
            'rent_city'=>['required','string'],
            'rent_description'=>['string','max:400']
        ])->validate();

        $data['user_id']=auth()->id();



        // $path=$request->file('rent_photo')->store('public');
        // $path=str_replace('public','storage',$path);
        // $data['rent_photo']=$path;

        $rent=Rent::create($data);

        if ($request->hasFile('rent_photo'))
        {
            foreach ($request->file('rent_photo') as $photo)
            {
                $rent->addMedia($photo)->toMediaCollection('rentimages');
            }
        }

        return redirect()->route('rents.index');

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rent=Rent::find($id);
        return view('rent.show',compact('rent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rent $rent)
    {
        return view('rent.update',compact('rent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Rent $rent)
    {

        $data=$request->all();

        Validator::make($data,[
            'rent_photo'=>['array','required'],
            'rent_photo .*'=>['image'],
            'rent_num'=>['required','integer'],
            'rent_price'=>['required','integer'],
            'rent_address'=>['required'],
            'rent_city'=>['required','string'],
            'rent_description'=>['string','max:400']])->validate();

            // if($request->hasFile('rent_photo'))
            // {
            //     $path=$request->file('rent_photo')->store('public');
            //     $path=str_replace('public','storage',$path);
            //     $data['rent_photo']=$path;
            // }

            $data=[
                'rent_num'=>$request->rent_num,
                'rent_price'=>$request->rent_price,
                'rent_address'=>$request->rent_address,
                'rent_city'=>$request->rent_city,
                'rent_description'=>$request->rent_description,
            ];

            if ($request->hasFile('rent_photo'))
            {
                foreach ($request->file('rent_photo') as $photo)
                {
                    $rent->addMedia($photo)->toMediaCollection('rentimages');
                }
            }

        return redirect()->route('rents.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rent=Rent::find($id);
        $rent->delete();
        return redirect()->route('rents.index');
    }
}
