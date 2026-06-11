<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    public function createRestaurant(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'cuisine_type' => 'required',

            'image' => 'nullable|image|max:2048',
            'breakfast_image' => 'nullable|image|max:2048',
            'lunch_image' => 'nullable|image|max:2048',
            'dinner_image' => 'nullable|image|max:2048',
        ]);

        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['address'] = strip_tags($incomingFields['address']);
        $incomingFields['cuisine_type'] = strip_tags($incomingFields['cuisine_type']);
        $incomingFields['user_id'] = auth()->id();

        // Restaurant Image
        if ($request->hasFile('image')) {
            $incomingFields['image_path'] =
                $request->file('image')->store('restaurants', 'public');
        }

        // Breakfast Image
        if ($request->hasFile('breakfast_image')) {
            $incomingFields['breakfast_image'] =
                $request->file('breakfast_image')->store('meal-images', 'public');
        }

        // Lunch Image
        if ($request->hasFile('lunch_image')) {
            $incomingFields['lunch_image'] =
                $request->file('lunch_image')->store('meal-images', 'public');
        }

        // Dinner Image
        if ($request->hasFile('dinner_image')) {
            $incomingFields['dinner_image'] =
                $request->file('dinner_image')->store('meal-images', 'public');
        }

        unset($incomingFields['image']);

        Restaurant::create($incomingFields);

        return redirect('/dashboard');
    }

    public function showRestaurant(Restaurant $restaurant)
    {
        $restaurant->load('reviews.user');

        return view('restaurant', [
            'restaurant' => $restaurant
        ]);
    }

    public function showEditScreen(Restaurant $restaurant)
    {
        if (auth()->id() != $restaurant->user_id) {
            return redirect('/dashboard');
        }

        return view('edit-restaurant', [
            'restaurant' => $restaurant
        ]);
    }

    public function updateRestaurant(Restaurant $restaurant, Request $request)
    {
        if (auth()->id() != $restaurant->user_id) {
            return redirect('/dashboard');
        }

        $incomingFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'cuisine_type' => 'required',

            'image' => 'nullable|image|max:2048',
            'breakfast_image' => 'nullable|image|max:2048',
            'lunch_image' => 'nullable|image|max:2048',
            'dinner_image' => 'nullable|image|max:2048',
        ]);

        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);
        $incomingFields['address'] = strip_tags($incomingFields['address']);
        $incomingFields['cuisine_type'] = strip_tags($incomingFields['cuisine_type']);

        // Restaurant Image
        if ($request->hasFile('image')) {
            if ($restaurant->image_path) {
                Storage::disk('public')->delete($restaurant->image_path);
            }

            $incomingFields['image_path'] =
                $request->file('image')->store('restaurants', 'public');
        }

        // Breakfast Image
        if ($request->hasFile('breakfast_image')) {
            if ($restaurant->breakfast_image) {
                Storage::disk('public')->delete($restaurant->breakfast_image);
            }

            $incomingFields['breakfast_image'] =
                $request->file('breakfast_image')->store('meal-images', 'public');
        }

        // Lunch Image
        if ($request->hasFile('lunch_image')) {
            if ($restaurant->lunch_image) {
                Storage::disk('public')->delete($restaurant->lunch_image);
            }

            $incomingFields['lunch_image'] =
                $request->file('lunch_image')->store('meal-images', 'public');
        }

        // Dinner Image
        if ($request->hasFile('dinner_image')) {
            if ($restaurant->dinner_image) {
                Storage::disk('public')->delete($restaurant->dinner_image);
            }

            $incomingFields['dinner_image'] =
                $request->file('dinner_image')->store('meal-images', 'public');
        }

        unset($incomingFields['image']);

        $restaurant->update($incomingFields);

        return redirect('/dashboard');
    }

    public function deleteRestaurant(Restaurant $restaurant)
    {
        if (auth()->id() == $restaurant->user_id) {

            if ($restaurant->image_path) {
                Storage::disk('public')->delete($restaurant->image_path);
            }

            if ($restaurant->breakfast_image) {
                Storage::disk('public')->delete($restaurant->breakfast_image);
            }

            if ($restaurant->lunch_image) {
                Storage::disk('public')->delete($restaurant->lunch_image);
            }

            if ($restaurant->dinner_image) {
                Storage::disk('public')->delete($restaurant->dinner_image);
            }

            $restaurant->reviews()->delete();
            $restaurant->delete();
        }

        return redirect('/dashboard');
    }

    public function allRestaurant()
    {
        $restaurants = Restaurant::with('reviews')
            ->latest()
            ->get();

        return view('allrestaurant', compact('restaurants'));
    }
}