<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $cars = Car::all(['slug', 'updated_at', 'id']);
        
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        // Static Pages
        $staticPages = [
            route('home'),
            route('about'),
            route('contact'),
            route('cars.index'),
        ];
        
        foreach ($staticPages as $url) {
            $xml .= '<url>';
            $xml .= '<loc>' . $url . '</loc>';
            $xml .= '<changefreq>daily</changefreq>';
            $xml .= '<priority>0.8</priority>';
            $xml .= '</url>';
        }
        
        // Dynamic Car Pages
        foreach ($cars as $car) {
            $xml .= '<url>';
            $xml .= '<loc>' . route('cars.show', $car->slug) . '</loc>';
            $xml .= '<lastmod>' . (isset($car->updated_at) ? $car->updated_at->toAtomString() : date('Y-m-d\TH:i:sP')) . '</lastmod>';
            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>0.6</priority>';
            $xml .= '</url>';
        }
        
        $xml .= '</urlset>';
        
        return response($xml, 200)->header('Content-Type', 'text/xml');
    }
}
