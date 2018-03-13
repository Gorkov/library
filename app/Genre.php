<?php

namespace App;

use App\Author;
use App\Book;
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
}
