<?php

namespace App\Http\Controllers\API;

use App\IMDB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IMDBAPIController extends Controller
{
    public $result = array('status'=>'false','message'=>'Unknown error');
    private $api_key = 'MuQKABJ28Swgd9b6RCrdMDHDJNYQMi';
    private $url = 'http://imdbapi.net/api';

    /**
     * Get Movie Data search by title.
     *
     * @return \Illuminate\Http\Response
     */
    public function title($title = false,$type = 'json')
    {
        $imdbData = IMDB::SearchTitle($title)->first();
        if($imdbData){//how to save 
            return response()->success($imdbData, 200);    
        } else {
            $param = array(
                'key'=>$this->api_key,
                'title'=>$title,
                'type'=>$type
            );
            $ch = curl_init($this->url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, count($param));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST  , 2);
            $result = curl_exec($ch);
            curl_close($ch);
            $data = json_decode($result);
            $data = (array)$data;
            $objImdb = new IMDB();
            $objImdb->actors = $data["actors"]; 
            $objImdb->budget = $data["budget"]; 
            $objImdb->country = $data["country"]; 
            $objImdb->director = $data["director"]; 
            $objImdb->genre = $data["genre"]; 
            $objImdb->gross = $data["gross"]; 
            $objImdb->imdb_id = $data["imdb_id"]; 
            $objImdb->language = $data["language"]; 
            $objImdb->metascore = $data["metascore"]; 
            $objImdb->opening_weekend = $data["opening_weekend"]; 
            $objImdb->plot = $data["plot"]; 
            $objImdb->poster = $data["poster"]; 
            $objImdb->production = $data["production"]; 
            $objImdb->rated = $data["rated"]; 
            $objImdb->rating = $data["rating"]; 
            $objImdb->released = $data["released"]; 
            $objImdb->runtime = $data["runtime"]; 
            $objImdb->status = $data["status"]; 
            $objImdb->title = $data["title"]; 
            $objImdb->type = $data["type"]; 
            $objImdb->votes = $data["votes"]; 
            $objImdb->writers = $data["writers"]; 
            $objImdb->year = $data["year"]; 
            $objImdb->save();
            return response()->success($data, 200);
        }
    }
}
