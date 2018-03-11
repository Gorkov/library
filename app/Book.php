<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\JoinClause;

class Book extends Model
{
    public $table = 'books';

    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }


    /**
     * Get books information in expanded form
     *
     */
    public static function getAllBooksInfo()
    {
        $books = self::select([
            'b.id',
            'b.name',
            'b.rating',
            'b.author_id',
            'a.name as author_name',
            'a.surname as author_surname',
            'b.genre_id',
            'g.name as genre_name'
        ])
            ->from('books as b')
            ->where('b.removed','=',0)
            ->join('authors as a', function(JoinClause $join) {
                $join->on('b.author_id','=','a.id')
                    ->where('a.removed','=',0);
            })
            ->join('genres as g', function(JoinClause $join) {
                $join->on('b.genre_id','=','g.id')
                    ->where('g.removed','=',0);
            })
            ->orderBy('b.id','ASC')
            ->get();
        ;

        return ($books->isNotEmpty()) ? $books : [];
    }
}
