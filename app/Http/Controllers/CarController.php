<?php

namespace App\Http\Controllers;
use App\Models\Car;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        // $now= new Test();
        // $greet = $now->greet();
        // return view('tests.index', compact("greet"));
        $car = new Car("big", "red", "Japan");
        dd($car);
        $car = $car ->getCar();
        dd($car);
        return view('tests.index', compact("car"));
    }
}
