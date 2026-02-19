<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredCars = Car::orderBy('id', 'desc')->take(6)->get();
        return view('home', compact('featuredCars'));
    }

    public function cars(Request $request)
    {
        $cars = Car::orderBy('id', 'desc')->paginate(24);
        return view('cars.index', compact('cars'));
    }

    public function carDetail($slug)
    {
        $car = Car::where('slug', $slug)->firstOrFail();
        return view('cars.show', compact('car'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
