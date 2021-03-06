<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Product;



class CarsController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();

        // We want to loop over this in our UI -- go to index.blade.php for more
        return view('/cars/index', [
            'cars' => $cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // We want to create a functionality in the page for users to create a car
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'founded' => 'required|integer|min:0|max:2021',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = time().'-'.$request->name . '.'.$request->image->extension();

        $request->image->move(public_path('images'), $newImageName);


        // $request->validate([
        //     'name' => 'required|unique:cars',
        //     'founded' =>'required|integer|min:0|max:2021',
        //     'description'=>'required',
        //     'image'
        // ]);

        // Now we can use that to store our data
        // Don't forget the save method =]
        // In index.blade.php we did something that granted a token for each session. 
        $car = Car::create([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description'),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $car = Car::find($id);
        return view('cars.show')->with('car', $car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // You need to define the variable $car in the controller in order for the view to work properly
        $car = Car::find($id);
        
        // return a view from your cars folder in resources/views 
        return view('cars.edit')->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Basically the same as create with a couple changes... 
        $car = Car::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'founded' => $request->input('founded'),
                'description' => $request->input('description')
        ]);

        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Test out the id by dd
        // dd($id);

        $car = Car::find($id);
        $car->delete();
        return redirect('/cars');
    }
}
