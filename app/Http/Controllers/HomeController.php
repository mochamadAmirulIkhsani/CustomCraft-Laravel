<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * The main entry point of the website.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        // Get the features.
        $features = [
            [
                'icon' => 'images/icon/1stmedal.svg',
                'title' => 'Kualitas Unggul',
                'desc' => 'Dengan kualitas unggul, kami memastikan setiap produk dibuat dengan perhatian penuh terhadap detail dan standar tertinggi',
            ],
            [
                'icon' => 'images/icon/clock.svg',
                'title' => 'Tepat Waktu',
                'desc' => 'Dengan komitmen pada ketepatan waktu, kami memastikan setiap produk selesai sesuai dengan harapan dan jadwal Anda',
            ],
            [
                'icon' => 'images/icon/lamplight.svg',
                'title' => 'Kreatifitas & Inovasi',
                'desc' => 'Kreativitas tanpa batas dan kualitas unggul, kami memastikan setiap produk mencerminkan ide dan gaya unik Anda',
            ],
        ];

        // Get the 6 latest products
        $products = Product::latest()->take(6)->get();

        // Get the reviews
        $reviews = [
            ['image' => 'images/reviews/review1.png'],
            ['image' => 'images/reviews/review2.png'],
            ['image' => 'images/reviews/review3.png'],
            ['image' => 'images/reviews/review4.png'],
        ];

        // Get the banner images
        $bannerImages = [];
        $bannerRecord = Banner::first();

        if ($bannerRecord) {
            if ($bannerRecord->image)  $bannerImages[] = $bannerRecord->image;
            if ($bannerRecord->image2) $bannerImages[] = $bannerRecord->image2;
            if ($bannerRecord->image3) $bannerImages[] = $bannerRecord->image3;
            if ($bannerRecord->image4) $bannerImages[] = $bannerRecord->image4;
        }

        // Pass data to the view
        return view('pages.home', compact('features', 'products', 'reviews', 'bannerImages'));
    }
}
