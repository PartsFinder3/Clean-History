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
                'description' => 'Comprehensive deletion of car history from autoAstat. Ensure a clear technical record for your US insurance vehicle.',
                'price' => '45',
                'image' => 'https://cleanautohistory.com/storage/photos/tZkiwykw6DlxLprM23Okr7R3OpLvy1BA3n7adPh7.webp'
            ],
            [
                'name' => 'BidCars',
                'description' => 'Full removal of photos and auction history from BidCars. Essential for maintaining vehicle value privacy.',
                'price' => '40',
                'image' => 'https://cleanautohistory.com/storage/photos/ZdYqrwG1tYxiaEYxQI2X6S0iMnS0F82tBiMZJ9yF.webp'
            ],
            [
                'name' => 'AuctionHistory IO',
                'description' => 'Permanent erasure of sales data and high-res photos from AuctionHistory.io database.',
                'price' => '50',
                'image' => 'https://cleanautohistory.com/storage/photos/sccHKB2mlEqknxRzZRGIosyevnDYzLxyesbV7p40.webp'
            ],
            [
                'name' => 'BidFax',
                'description' => 'Specialized service to hide Copart and IAAI auction history from the popular BidFax platform.',
                'price' => '35',
                'image' => 'https://cleanautohistory.com/storage/photos/w5QGr0Cx2uqqRUOJwNWMO3lGyDwdYlWYHiUtAVjK.webp'
            ],
            [
                'name' => 'autoauctions.io',
                'description' => 'Clean your global auction record. We remove VIN data from autoauctions.io permanently.',
                'price' => '55',
                'image' => 'https://cleanautohistory.com/storage/photos/RB7c4TC4ntG0EOhwFAQhnBOP7ii8BcMtqlidCLRy.webp'
            ],
            [
                'name' => 'Carfast Express',
                'description' => 'Delete auction photos and pricing history from Carfast Express for any US or Canadian vehicle.',
                'price' => '45',
                'image' => 'https://cleanautohistory.com/storage/photos/lBLyH3D7DKMWS5yadmQylaTeuovtLJkBW7hqit4U.webp'
            ],
            [
                'name' => 'Atlantic Express',
                'description' => 'Reliable information removal from Atlantic Express database. Protect your VIN from public search.',
                'price' => '40',
                'image' => 'https://cleanautohistory.com/storage/photos/c1c2mqRi2GKpwwIjdZoSi2zjN2Sp1pRMj7hx0Nqg.webp'
            ],
            [
                'name' => 'Auto Bid Master',
                'description' => 'Erasing your car history from Auto Bid Master. No more public record of your insurance purchase.',
                'price' => '45',
                'image' => 'https://cleanautohistory.com/storage/photos/1ODDQHQNpFT9Utz7SpiC8msfQ1NN8ZNw2yw0X0XL.webp'
            ],
            [
                'name' => 'Stat Vin',
                'description' => 'Remove detailed auction statistics and salvage history from the StatVin global database.',
                'price' => '50',
                'image' => 'https://cleanautohistory.com/storage/photos/pZoGem0e6uONFwCAKWBmXCx1ElyL5l9kpov1Vade.webp'
            ],
            [
                'name' => 'PLC GROUP',
                'description' => 'Complete vehicle data removal from PLC Group registry. High-speed processing for all US cars.',
                'price' => '40',
                'image' => 'https://cleanautohistory.com/storage/photos/d9fG7NnTBlYMuANWTTFYoUAghWdG0RCXl7wM1InR.webp'
            ],
            [
                'name' => 'AutoAuctionHistory',
                'description' => 'Wipe clean your auction history from AutoAuctionHistory.com. Full privacy for your vehicle VIN.',
                'price' => '45',
                'image' => 'https://cleanautohistory.com/storage/photos/ZRLIXwafLTWZZxyhwN1eZ6HPTXgIqqTxXzmAf9DO.webp'
            ],
            [
                'name' => 'America Motors',
                'description' => 'Remove your car details from America Motors. We ensure no photos or data remain public.',
                'price' => '40',
                'image' => 'https://cleanautohistory.com/storage/photos/VMLW1nCt6ICTG1Qg93bAQHMNuOcNvtT2O4CK8q2n.webp'
            ],
            [
                'name' => 'AuctionAuto UA',
                'description' => 'Professional cleaning of vehicle history from AuctionAuto UA results. Verified and permanent.',
                'price' => '50',
                'image' => 'https://cleanautohistory.com/storage/photos/9EpqUj5JsCqWOdMLj1pFcJQhGt6duqsQKkwHWpbk.webp'
            ],
        ];
        return view('products', compact('products'));
    }
}
