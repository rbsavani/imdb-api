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
        if($imdbData){ 
            return response()->success($imdbData, 200);    
        } else {
            // Call API And Get Data in $result
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
            if ($data["status"] == 'true') {
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
            }
            return response()->success($data, 200);
        }
    }

    /**
     * Get Movie Data search by ID.
     *
     * @return \Illuminate\Http\Response
     */
    public function getById($id = false,$type = 'json')
    {
        $imdbData = IMDB::SearchIMDBId($id)->first();
        if($imdbData){ 
            return response()->success($imdbData, 200);    
        } else {
            // Call API And Get Data in $result
            $param = array(
                'key'=>$this->api_key,
                'id'=>$id,
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

            // Save in Database
            $data = json_decode($result);
            $data = (array)$data;
            if ($data["status"] == 'true') {
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
            }
            return response()->success($data, 200);
        }
    }

    /**
     * Get Movie Data search by Keyword and year.
     *
     * @return \Illuminate\Http\Response
     */
    public function search($keyword = '', $year = '', $page = 0, $type = 'json')
    {
        $imdbData = IMDB::SearchKeyword($keyword, $year)->first();
        if($imdbData){ 
            return response()->success($imdbData, 200);    
        } else {
            $imdbDataKeyword = IMDB::SearchTitle($keyword)->first();
                if($imdbDataKeyword){ 
                    return response()->success($imdbDataKeyword, 200);    
                }  else {
                    // Call API And Get Data in $result
                    $param = array(
                        'key'=>$this->api_key,
                        'title'=>$keyword,
                        'year'=>$year,
                        'page'=>$page,
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

                    // Save in Database
                    $data = json_decode($result);
                    $data = (array)$data;
                    if ($data["status"] == 'true') {
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
                    }
                    return response()->success($data, 200);
                }


        }
    }

    /**
     * Get Movie Data search by year.
     *
     * @return \Illuminate\Http\Response
     */
    public function localSearchYear($data = '', $type = 'json')
    {
        $imdbData = IMDB::SearchYear($data)->get();
        if($imdbData){ 
            return response()->success($imdbData, 200);    
        } else {
            return response()->error($imdbData, 400);
        }
    }

    /**
     * Get Movie Data search by year.
     *
     * @return \Illuminate\Http\Response
     */
    public function localSearchGenres($data = '', $type = 'json')
    {
        $imdbData = IMDB::SearchGenres($data)->get();
        if($imdbData){ 
            return response()->success($imdbData, 200);    
        } else {
            return response()->error($imdbData, 400);
        }
    }

    /**
     * Get Movie Data search by year.
     *
     * @return \Illuminate\Http\Response
     */
    public function localSearchByRating($data = '', $GL = '1', $type = 'json')
    {
        if ($GL == 1) {
            $imdbData = IMDB::SearchRatingH($data)->get();
            if($imdbData){ 
                return response()->success($imdbData, 200);    
            } else {
                return response()->error($imdbData, 400);
            }
        } elseif ($GL == 2) {
            $imdbData = IMDB::SearchRatingL($data)->get();
            if($imdbData){ 
                return response()->success($imdbData, 200);    
            } else {
                return response()->error($imdbData, 400);
            }
        }
    }
}
