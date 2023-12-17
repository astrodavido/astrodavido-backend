<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function getImages()
    {
        $response = Http::get('http://astrobin.com/api/v1/image/?user=astro_davido&api_key=04136fb24aaeb2c8bdcb1d165aef5eaf9bd24bd6&api_secret=2a7c29d6f2cf9846df8e69ae2b65c59406535533&format=json&limit=50');
        
        $jsonData = $response->json();
        $images = [];
        
        foreach ($jsonData['objects'] as $image) {
            if (!$image['animated']) {
                if (!$image['is_final'] && $image['revisions']) {
                    $split_url = explode('/', $image['revisions'][0]);
                    $revision_id = $split_url[4];
                    
                    $revision_response = Http::get('http://astrobin.com/api/v1/imagerevision/' . $revision_id . '?api_key=04136fb24aaeb2c8bdcb1d165aef5eaf9bd24bd6&api_secret=2a7c29d6f2cf9846df8e69ae2b65c59406535533&format=json');

                    $revision_jsonData = $revision_response->json();
                    $revision_jsonData['title'] = $image['title'];
                    $revision_jsonData['published'] = $image['published'];
                    
                    $images[] = $revision_jsonData;
                } else {
                    $images[] = $image;
                }
            }
        }
          
        return $images;
    }

    public function getImage(Request $request)
    {
        $id = $request->id;
        
        $response = Http::get('http://astrobin.com/api/v1/imagerevision/' . $id . '?api_key=04136fb24aaeb2c8bdcb1d165aef5eaf9bd24bd6&api_secret=2a7c29d6f2cf9846df8e69ae2b65c59406535533&format=json');

        $jsonData = $response->json();

        return $jsonData;
    }
}
