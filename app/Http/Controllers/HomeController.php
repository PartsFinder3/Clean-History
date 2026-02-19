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

    public function products()
    {
        $products = [
            [
                'name' => 'autoAstat',
                'description' => 'Deleting car history from autoAstat. No one wants to buy a car without a clear understanding of its technical condition and history.',
                'image' => 'https://cleanautohistory.com/storage/products/September2023/C9C8q2Uis5o9YjB1lA5U.png'
            ],
            [
                'name' => 'BidCars',
                'description' => 'Deleting car history from BidCars. Buying and bringing an insurance car from the USA is much easier than many people think.',
                'image' => 'https://cleanautohistory.com/storage/products/September2023/G6m8c3N3j0x7V2B9lA5U.png'
            ],
            [
                'name' => 'AuctionHistory IO',
                'description' => 'Deleting car history from AuctionHistory IO. Finding out the car\'s history begins the search for a suitable vehicle at any American auction.',
                'image' => 'https://cleanautohistory.com/storage/products/September2023/H8m2c6N5j0x1V4B3lA5U.png'
            ],
            [
                'name' => 'BidFax',
                'description' => 'Deleting car history from BidFax. There are a lot of options for finding information about insurance vehicles that are sold at Copart and IAAI auctions.',
                'image' => 'https://cleanautohistory.com/storage/products/September2023/J2m4c1N9j8x5V0B7lA5U.png'
            ],
            [
                'name' => 'autoauctions.io',
                'description' => 'Deleting car history from autoauctions.io. Users from anywhere in the world can participate in car auctions.',
                'image' => 'https://cleanautohistory.com/storage/products/September2023/K0m6c2N1j4x9V2B5lA5U.png'
            ],
            [
                'name' => 'Carfast Express',
                'description' => 'Deleting car history from Carfast Express. Both financially and from a practical point of view, a more attractive option for buying a car.',
                'image' => 'https://cleanautohistory.com/storage/products/September2023/L4m8c4N3j2x7V6B9lA5U.png'
            ],
            [
                'name' => 'Atlantic Express',
                'description' => 'Deleting car history from Atlantic Express. More and more motorists prefer to buy used cars in the USA.',
                'image' => 'https://cleanautohistory.com/storage/products/September2023/M2m0c6N5j8x1V4B3lA5U.png'
            ],
            [
                'name' => 'Auto Bid Master',
                'description' => 'Deleting car history from Auto Bid Master. Not all motorists are ready to spend an exorbitant amount of money on a new car.',
                'image' => 'https://cleanautohistory.com/storage/products/September2023/N6m4c8N1j4x9V2B5lA5U.png'
            ],
            [
                'name' => 'Stat Vin',
                'description' => 'Global statistical information about auto auctions gathered in one place and updated daily.',
                'image' => 'https://cleanautohistory.com/storage/products/September2023/O0m2c0N9j8x5V0B7lA5U.png'
            ],
            [
                'name' => 'PLC GROUP',
                'description' => 'Deleting car history from PLC GROUP. Professional removal of vehicle data from public databases.',
                'image' => 'https://cleanautohistory.com/storage/products/September2023/P4m8c4N3j2x7V6B9lA5U.png'
            ],
        ];
        return view('products', compact('products'));
    }
}
