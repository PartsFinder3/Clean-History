<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $cars = Car::orderBy('id', 'desc')->get();
        return view('admin.dashboard', compact('cars'));
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_name' => 'required|string',
            'vin' => 'required|string|unique:cars,vin',
            'description' => 'nullable|string',
            'car_image_url' => 'nullable|string',
            'mileage' => 'nullable|string',
            'location' => 'nullable|string',
            'damage' => 'nullable|string',
        ]);

        $validated['vin'] = strtoupper(trim($validated['vin']));
        $validated['slug'] = strtoupper(preg_replace('/[^A-Z0-9]/', '', $validated['vin']));
        
        Car::create($validated);

        return back()->with('success', 'Car added successfully!');
    }

    public function checkVins(Request $request)
    {
        // Normalize incoming VINs to Uppercase and Trimmed
        $vins = array_map(function($v) {
            return strtoupper(trim($v));
        }, $request->input('vins', []));

        $existingVins = Car::whereIn('vin', $vins)->pluck('vin')->toArray();
        return response()->json(['existingVins' => $existingVins]);
    }

    public function bulkStore(Request $request)
    {
        $carsData = $request->input('cars', []);
        
        if (empty($carsData)) {
            return response()->json(['success' => false, 'error' => 'No data provided'], 400);
        }

        $count = 0;
        foreach ($carsData as $data) {
            if (empty($data['vin']) || empty($data['car_name'])) continue;

            // Normalize VIN
            $cleanVin = strtoupper(trim($data['vin']));
            $slug = strtoupper(preg_replace('/[^A-Z0-9]/', '', $cleanVin));
            
            Car::updateOrCreate(
                ['vin' => $cleanVin], // Use normalized VIN for matching
                [
                    'car_name' => trim($data['car_name']),
                    'description' => $data['description'] ?? null,
                    'car_image_url' => $data['car_image_url'] ?? null,
                    'mileage' => $data['mileage'] ?? null,
                    'location' => $data['location'] ?? null,
                    'damage' => $data['damage'] ?? null,
                    'slug' => $slug
                ]
            );
            $count++;
        }

        return response()->json(['success' => true, 'count' => $count]);
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return back()->with('success', 'Car deleted successfully!');
    }

    public function destroyAll()
    {
        Car::truncate();
        return back()->with('success', 'All cars deleted!');
    }
}
