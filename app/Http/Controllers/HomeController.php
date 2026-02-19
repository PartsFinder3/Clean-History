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
        $products = $this->getProductsData();
        return view('products', compact('products'));
    }

    public function serviceDetail($slug)
    {
        $products = $this->getProductsData();
        $product = collect($products)->firstWhere('slug', $slug);
        
        if (!$product) {
            abort(404);
        }

        return view('services.show', compact('product'));
    }

    private function getProductsData()
    {
        return [
            [
                'name' => 'autoAstat',
                'slug' => 'autoastat',
                'description' => 'Comprehensive deletion of car history from autoAstat. Ensure a clear technical record for your US insurance vehicle.',
                'full_description' => 'Deleting car history from autoAstat is essential for anyone interested in American and Canadian cars. autoAstat is a specialized resource where data on various auction lots is stored. Our service provides a specialized removal process that clears information about the lot without the possibility of subsequent recovery. We help you avoid excessive attention to foreign transactions and create optimal conditions for resale.',
                'meta_title' => 'Remove VIN history from autoAstat | Professional Data Deletion',
                'meta_description' => 'Delete VIN and car history from autoAstat. Permanent removal of auction records, photos, and price history from the autoAstat database.',
                'price' => '45',
                'image' => 'https://cleanautohistory.com/storage/photos/tZkiwykw6DlxLprM23Okr7R3OpLvy1BA3n7adPh7.webp'
            ],
            [
                'name' => 'BidCars',
                'slug' => 'bidcars',
                'description' => 'Full removal of photos and auction history from BidCars. Essential for maintaining vehicle value privacy.',
                'full_description' => 'BidCars is a popular platform for tracking insurance cars from the USA. If you want to protect your privacy and maintain the resale value of your vehicle, deleting its history from BidCars is a smart move. Our professional team ensures all photos, pricing details, and condition reports are permanently erased from their public records.',
                'meta_title' => 'Delete Car History from BidCars | VIN Privacy Service',
                'meta_description' => 'Hide your vehicle from BidCars search results. We remove all auction data and high-resolution photos permanently from BidCars.',
                'price' => '40',
                'image' => 'https://cleanautohistory.com/storage/photos/ZdYqrwG1tYxiaEYxQI2X6S0iMnS0F82tBiMZJ9yF.webp'
            ],
            [
                'name' => 'AuctionHistory IO',
                'slug' => 'auctionhistory-io',
                'description' => 'Permanent erasure of sales data and high-res photos from AuctionHistory.io database.',
                'full_description' => 'AuctionHistory.io provides detailed insights into American auctions. Finding out a car\'s history starts here for many buyers. By deleting your car\'s record from this platform, you ensure that future buyers or third parties cannot access detailed salvage or sale information that could impact your vehicle\'s marketability.',
                'meta_title' => 'AuctionHistory.io VIN Removal | Hide Auction Records',
                'meta_description' => 'Permanently remove your car\'s data and images from AuctionHistory.io. Expert VIN cleaning service with guaranteed results.',
                'price' => '50',
                'image' => 'https://cleanautohistory.com/storage/photos/sccHKB2mlEqknxRzZRGIosyevnDYzLxyesbV7p40.webp'
            ],
            [
                'name' => 'BidFax',
                'slug' => 'bidfax',
                'description' => 'Specialized service to hide Copart and IAAI auction history from the popular BidFax platform.',
                'full_description' => 'BidFax is one of the most widely used databases for checking vehicle auction history. It often contains low-quality salvage photos and pricing that can be detrimental to a car\'s image. Our service specialized in BidFax removal, wiping the slate clean so your car appears in its best light.',
                'meta_title' => 'BidFax History Removal | Delete VIN Data & Photos',
                'meta_description' => 'Remove your vehicle from BidFax.info. We delete all auction records, price history, and salvage photos for US and Canadian cars.',
                'price' => '35',
                'image' => 'https://cleanautohistory.com/storage/photos/w5QGr0Cx2uqqRUOJwNWMO3lGyDwdYlWYHiUtAVjK.webp'
            ],
            [
                'name' => 'autoauctions.io',
                'slug' => 'autoauctions-io',
                'description' => 'Clean your global auction record. We remove VIN data from autoauctions.io permanently.',
                'full_description' => 'Users from all over the world participate in auctions like Copart and IAAI, and autoauctions.io is where they go to verify the details. Deleting your vehicle\'s history from this site is a critical step in ensuring total privacy for your international car purchase.',
                'meta_title' => 'autoauctions.io VIN Cleaning | Remove Salvage Record',
                'meta_description' => 'Wipe your car\'s history from autoauctions.io. Professional removal of VIN data, pricing, and high-quality auction images.',
                'price' => '55',
                'image' => 'https://cleanautohistory.com/storage/photos/RB7c4TC4ntG0EOhwFAQhnBOP7ii8BcMtqlidCLRy.webp'
            ],
            [
                'name' => 'Carfast Express',
                'slug' => 'carfast-express',
                'description' => 'Delete auction photos and pricing history from Carfast Express for any US or Canadian vehicle.',
                'full_description' => 'Carfast Express is a key site for auction history tracking. Whether for financial or practical reasons, buyers use this to scrutinize used cars. Our removal service clears your car\'s VIN from their records, giving you control over what information is available to the public.',
                'meta_title' => 'Carfast Express Data Removal | Clean VIN History',
                'meta_description' => 'Permanently delete your vehicle information from Carfast Express. We remove all auction logs and photos for total confidentiality.',
                'price' => '45',
                'image' => 'https://cleanautohistory.com/storage/photos/lBLyH3D7DKMWS5yadmQylaTeuovtLJkBW7hqit4U.webp'
            ],
            [
                'name' => 'Atlantic Express',
                'slug' => 'atlantic-express',
                'description' => 'Reliable information removal from Atlantic Express database. Protect your VIN from public search.',
                'full_description' => 'Many motorists prefer used cars from the USA, and Atlantic Express is a frequent source of information. We offer a reliable way to simplify your vehicle\'s public record by removing detailed auction statistics and salvage data from their platform.',
                'meta_title' => 'Atlantic Express VIN Removal | Professional Service',
                'meta_description' => 'Remove your car from Atlantic Express. Professional cleaning of VIN history, images, and auction results.',
                'price' => '40',
                'image' => 'https://cleanautohistory.com/storage/photos/c1c2mqRi2GKpwwIjdZoSi2zjN2Sp1pRMj7hx0Nqg.webp'
            ],
            [
                'name' => 'Auto Bid Master',
                'slug' => 'auto-bid-master',
                'description' => 'Erasing your car history from Auto Bid Master. No more public record of your insurance purchase.',
                'full_description' => 'Auto Bid Master carries a vast archive of auction sales. To create optimal conditions for your vehicle\'s future, our service ensures that any history related to its auction purchase is removed from their public search results.',
                'meta_title' => 'Auto Bid Master VIN Cleaning | Hide Auction Photos',
                'meta_description' => 'Delete your vehicle sales data from Auto Bid Master. We specialize in permanent VIN history removal and image deletion.',
                'price' => '45',
                'image' => 'https://cleanautohistory.com/storage/photos/1ODDQHQNpFT9Utz7SpiC8msfQ1NN8ZNw2yw0X0XL.webp'
            ],
            [
                'name' => 'Stat Vin',
                'slug' => 'stat-vin',
                'description' => 'Remove detailed auction statistics and salvage history from the StatVin global database.',
                'full_description' => 'StatVin is a resource with global statistical information about auto auctions. It shares auction sales stories daily. Our VIN cleaner service ensures that your specific car is removed from this global database, protecting your property details.',
                'meta_title' => 'Stat Vin History Removal | Clean VIN Global Records',
                'meta_description' => 'Permanent deletion of car history from Stat Vin. We clear all statistical data, photos, and sale records for your VIN.',
                'price' => '50',
                'image' => 'https://cleanautohistory.com/storage/photos/pZoGem0e6uONFwCAKWBmXCx1ElyL5l9kpov1Vade.webp'
            ],
            [
                'name' => 'PLC GROUP',
                'slug' => 'plc-group',
                'description' => 'Complete vehicle data removal from PLC Group registry. High-speed processing for all US cars.',
                'full_description' => 'PLC Group is a well-known name in the US car export industry. Their database can hold information that you might not want to remain public. We provide high-speed processing to remove your vehicle data from their technical registries.',
                'meta_title' => 'PLC Group VIN Removal | Delete Auction History',
                'meta_description' => 'Clean your car\'s records from PLC Group. We ensure professional removal of all vehicle history and photos from their database.',
                'price' => '40',
                'image' => 'https://cleanautohistory.com/storage/photos/d9fG7NnTBlYMuANWTTFYoUAghWdG0RCXl7wM1InR.webp'
            ],
            [
                'name' => 'AutoAuctionHistory',
                'slug' => 'autoauctionhistory',
                'description' => 'Wipe clean your auction history from AutoAuctionHistory.com. Full privacy for your vehicle VIN.',
                'full_description' => 'AutoAuctionHistory.com is a major destination for tracking American auction lots. Our professional cleaning service wipes your VIN clean from their records, ensuring a fresh start for your vehicle\'s public identity.',
                'meta_title' => 'AutoAuctionHistory.com Removal | Clean VIN & Photos',
                'meta_description' => 'Delete auction data from AutoAuctionHistory. We provide guaranteed removal of photos and pricing for your US salvage vehicle.',
                'price' => '45',
                'image' => 'https://cleanautohistory.com/storage/photos/ZRLIXwafLTWZZxyhwN1eZ6HPTXgIqqTxXzmAf9DO.webp'
            ],
            [
                'name' => 'America Motors',
                'slug' => 'america-motors',
                'description' => 'Remove your car details from America Motors. We ensure no photos or data remain public.',
                'full_description' => 'America Motors databases store information about countless vehicles sold abroad. We help you remotely remove records, vehicle characteristics, and photos from their platform without you having to make any manual effort.',
                'meta_title' => 'America Motors Data Removal | VIN History Cleaner',
                'meta_description' => 'Hide car details from America Motors. Permanent erasure of auction history and salvage photos for any VIN number.',
                'price' => '40',
                'image' => 'https://cleanautohistory.com/storage/photos/VMLW1nCt6ICTG1Qg93bAQHMNuOcNvtT2O4CK8n.webp'
            ],
            [
                'name' => 'AuctionAuto UA',
                'slug' => 'auctionauto-ua',
                'description' => 'Professional cleaning of vehicle history from AuctionAuto UA results. Verified and permanent.',
                'full_description' => 'AuctionAuto UA is another prominent site where insurance car details are archived. Our team of programmers takes care of the final disappearance of your vehicle\'s mentions on their site, ensuring your confidentiality.',
                'meta_title' => 'AuctionAuto UA VIN Cleaning | Delete Car Records',
                'meta_description' => 'Professional removal of vehicle history from AuctionAuto UA. We delete all auction logs, photos, and sale details permanently.',
                'price' => '50',
                'image' => 'https://cleanautohistory.com/storage/photos/9EpqUj5JsCqWOdMLj1pFcJQhGt6duqsQKkwHWpbk.webp'
            ],
        ];
    }
}

