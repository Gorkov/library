<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    /**
     * Get genres information in expanded form
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAllGenresInfo()
    {
        $genres = self::all();
        if ($genres->isEmpty()) {
            return null;
        }

        $books = Book::getAllBooksInfo();
        if ($books->isEmpty()) {
            return null;
        }

        foreach ($genres as &$genre) {
            $genre['authors'] = Author::getAuthorsByGenre($genre->id, $books);
        }

        return $genres;
    }

    /**
     * Get genres list by one author
     *
     * @param int $authorID
     * @return array
     */
    public static function getGenresByAuthor(int $authorID):array
    {
        $authorBooks = Book::getBooksByAuthor($authorID);
        if (empty($authorBooks)) {
            return null;
        }

        $genresByAuthor = [];

        $authorBooks = $authorBooks->values()->unique('genre_id');

        foreach ($authorBooks as $book) {
            $genresByAuthor[] = $book->genre_id;
        }

        return $genresByAuthor;
    }
}
