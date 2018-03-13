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
            $author->books = Book::getBooksByAuthor($author->id, $books)->count();
            $author->rating = Book::getAverageBooksRating($author->id, $books);
        }

        if (!empty($filter)) {
            $authors = $authors->sortByDesc($filter)->values();
        }

        return ($authors->isNotEmpty()) ? $authors : null;
    }

    /**
     * Get authors by genre
     *
     * @param int $genreID
     * @param $books
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAuthorsByGenre(int $genreID = 0, $books = null)
    {
        if (!isset($books)) {
            $books = Book::getAllBooksInfo();
        }

        $genreBooks = $books->filter(function($book) use ($genreID) {
            return $book->genre_id === $genreID;
        });

        foreach ($genreBooks as &$book) {
            $book->author_rating = Book::getAverageBooksRating($book->author_id, $books);
            $book->book_id = $book->id;
            $book->book_name = $book->name;
            $book->book_rating = $book->rating;
            unset($book->id,$book->name,$book->rating);
        }

        $genreAuthors = $genreBooks->unique('author_id')->values();

        return $genreAuthors;

    }
}
