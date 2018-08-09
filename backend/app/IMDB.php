<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IMDB extends Model
{
    protected $fillable = ['actors', 'budget', 'country', 'director', 'genre', 'gross', 'imdb_id', 'language', 'metascore', 'opening_weekend', 'plot', 'poster', 'production', 'rated', 'rating', 'released', 'runtime', 'status', 'title', 'type', 'votes', 'writers', 'year', 'created_at', 'updated_at'];

    // Title Search Model Method
    public function scopeSearchTitle($query, $title)
    {
        if ($title != '') {
            $query->where('title', 'like', '%' . $title . '%');
        }
        return $query;
    }

    // IMDB Id Search Model Method
    public function scopeSearchIMDBId($query, $id)
    {
        if ($id != '') {
            $query->where('imdb_id', 'like', '%' . $id . '%');
        }
        return $query;
    }

    // Title Search Model Method
    public function scopeSearchKeyword($query, $title, $year)
    {
        if ($title != '') {
            $query->where('title', 'like', '%' . $title . '%')->where('year', 'like', '%' . $year . '%');
        }
        return $query;
    }
    
    protected $table = 'imdb';
}
