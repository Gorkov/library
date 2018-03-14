<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\JoinClause;

class Book extends Model
{
    /**
     * Get books information in expanded form
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
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

        return $books;
    }

    /**
     * Get books by author
     *
     * @param int $authorID
     * @param $books
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getBooksByAuthor(int $authorID = 0, $books = null)
    {
        if (!isset($books)) {
            $books = Book::where('removed', 0)->get();
            if (empty($books)) {
                return null;
            }
        }
        $authorBooks = $books->filter(function($book) use ($authorID) {
            return $book->author_id === $authorID;
        });
        return $authorBooks;
    }

    /**
     * Get average books rating from this author
     *
     * @param int $authorID
     * @param null $books
     * @return mixed Element (int/float/double)
     */
    public static function getAverageBooksRating(int $authorID = 0, $books = null)
    {
        if (!isset($books)) {
            $books = Book::where('removed', 0)->get();
            if (empty($books)) {
                return null;
            }
        }
        $authorBooks = self::getBooksByAuthor($authorID, $books);
        $average = $authorBooks->avg('rating');

//        todo need create some /App/Lib/Functions.php for similar designs
        $average = gettype($average) === 'integer' ? $average : number_format($average, 1, '.', '');

        return $average;
    }
}
