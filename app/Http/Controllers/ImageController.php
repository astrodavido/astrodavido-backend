<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ImageController extends Controller
{
    public function getImages()
    {
        $response = Http::get('http://astrobin.com/api/v1/image/?user=astro_davido&api_key=04136fb24aaeb2c8bdcb1d165aef5eaf9bd24bd6&api_secret=2a7c29d6f2cf9846df8e69ae2b65c59406535533&format=json&limit=50');

        $jsonData = $response->json();
          
        return $jsonData;
    }
}
