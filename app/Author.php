<?php

namespace App;

use App\Book;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * Get authors information in expanded form
     *
     * @param string $filter
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAllAuthorsInfo(string $filter = '')
    {

        $authors = self::where('removed', 0)->get();

        $books = Book::where('removed', 0)->get();

        // added number of books, genre prevail and average books rating to the authors collection.
        foreach ($authors as &$author) {
            $author->books = self::getAuthorBooks($author->id, $books)->count();
            $author->rating = self::getAverageBooksRating($author->id, $books);
        }

        if (!empty($filter)) {
            $authors = $authors->sortByDesc($filter)->values();
        }

        return ($authors->isNotEmpty()) ? $authors : null;
    }

    /**
     * Get books from this author
     *
     * @param int $authorID
     * @param $books
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAuthorBooks(int $authorID = 0, $books = null)
    {
        if (!isset($books)) {
            $books = Book::where('removed', 0)->get();
        }
        $authorBooks = $books->filter(function($book) use ($authorID) {
            return $book->author_id === $authorID;
        });
        return $authorBooks;

    }

    /**
     * Get prevail genre from this author
     *
     * @param int $authorID
     * @param $books
     * @return string
     */
    public static function getGenrePrevail(int $authorID = 0, $books = null)
    {
        if (!isset($books)) {
            $books = Book::where('removed', 0)->get();
        }
        $authorBooks = self::getAuthorBooks($authorID, $books);

//        todo need to calculate and return the most popular genre from this author
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
        }
        $authorBooks = self::getAuthorBooks($authorID, $books);
        $average = $authorBooks->avg('rating');

//        todo need create some /App/Lib/Functions.php for similar designs
        $average = gettype($average) === 'integer' ? $average : number_format($average, 1, '.', '');

        return $average;
    }
}
