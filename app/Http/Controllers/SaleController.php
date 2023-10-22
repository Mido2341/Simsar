<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $sales=Sale::with('media')->with('user')->paginate(6);
        // $photo= $sales->getMedia('images');
        // dd($sales);
        $sales=Sale::with('user')->paginate();
        return view('sale.index',compact(['sales']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sale.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    //     {
    //         $data=$request->all();
    //         Validator::make($data,[
    //             'sale_photo'=>['array','required'],
    //             'sale_photo .*'=>['image'],
    //             'sale_price'=>['required','integer'],
    //             'sale_address'=>['required','string'],
    //             'sale_city'=>['required','string'],
    //             'sale_description'=>['string','max:400']
    //         ])->validate();


    //         $data['user_id']=auth()->id();

    //         $path=$request->file('sale_photo')->store('public');
    //         $path=str_replace('public','storage',$path);
    //         $data['sale_photo']=$path;



    //         Sale::create($data);
    //         return redirect()->route('sales.index');
    //     }


    public function store(Request $request)
    {
        $data=$request->all();
                Validator::make($data,[
                    'sale_photo'=>['array','required'],
                    'sale_photo .*'=>['image'],
                    'sale_num'=>['required','integer'],
                    'sale_price'=>['required','integer'],
                    'sale_address'=>['required','string'],
                    'sale_city'=>['required','string'],
                    'sale_description'=>['string','max:400']
        ])->validate();


        $data['user_id']=auth()->id();


        $sale = Sale::create($data);

        // Upload and attach photos to the product

        if ($request->hasFile('sale_photo'))
        {
            foreach ($request->file('sale_photo') as $photo )
            {
                $sale->addMedia($photo)->toMediaCollection('images');
            }
        }

        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sale=Sale::find($id);

        return view('sale.show',compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        return view('sale.update',compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Sale $sale)
    {
        $data=$request->all();

        Validator::make($data,[
            'sale_photo'=>['array','required'],
            'sale_photo .*'=>['image'],
            'sale_num'=>['required','integer'],
            'sale_price'=>['required','integer'],
            'sale_address'=>['required'],
            'sale_city'=>['required','string'],
            'sale_description'=>['string','max:400']])->validate();

            $data=[
                'sale_num'=>$request->sale_num,
                'sale_price'=>$request->sale_price,
                'sale_address'=>$request->sale_address,
                'sale_city'=>$request->sale_city,
                'sale_description'=>$request->sale_description,
            ];

            // $path=$request->file('sale_photo')->store('public');
            // $path=str_replace('public','storage',$path);
            // $data['sale_photo']=$path;

            if ($request->hasFile('sale_photo'))
            {
                foreach ($request->file('sale_photo') as $photo)
                {
                    $sale->addMedia($photo)->toMediaCollection('images');
                }
            }

        $sale->update($data);
        return redirect()->route('sales.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sale=Sale::find($id);
        $sale->delete();
        return redirect()->route('sales.index');
    }
}



            // if ($request->hasFile('sale_photo'))
            // {
            //     foreach ($request->sale_photo as $sale_image)
            //     {
            //         $imageName=$sale_image->getClientOriginalName();
            //         $imageExt=$sale_image->getClientOriginalExtension();

            //         $newName= uniqid("",true) .'.'. $imageExt;
            //         $sale_image->move('sales',$newName);
            //     }
            // }
