<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IMDB extends Model
{
    protected $fillable = ['actors', 'budget', 'country', 'director', 'genre', 'gross', 'imdb_id', 'language', 'metascore', 'opening_weekend', 'plot', 'poster', 'production', 'rated', 'rating', 'released', 'runtime', 'status', 'title', 'type', 'votes', 'writers', 'year', 'created_at', 'updated_at'];

    public function scopeSearchTitle($query, $title)
    {
        if ($title != '') {
            $query->where('title', 'like', '%' . $title . '%');
        }
        return $query;
    }
    protected $table = 'imdb';
}
