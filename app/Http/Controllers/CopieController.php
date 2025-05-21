<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Copie;
use DB;
use Illuminate\Http\Request;

class CopieController extends Controller
{


    public function index($slug)
    {

        $book = Book::where('slug', $slug)->first();

        $stateCounts = DB::table('copies_books') // O 'copies_books' si esa es tu tabla
            ->select('types_state.type_state', DB::raw('COUNT(copies_books.type_state_id) as count')) // Usar 'count' como alias es más común
            ->join('types_state', 'copies_books.type_state_id', '=', 'types_state.type_state_id')
            ->where('copies_books.book_id', $book->book_id)
            ->groupBy('types_state.type_state_id', 'types_state.type_state')
            ->get();

        $not_loaned = 0;
    
        foreach ($stateCounts as $key => $value) {
            if($value->type_state != 'Prestado'){
                $not_loaned = $not_loaned +  $value->count;
            }else{
                $loane = $value->count;
            }
        }

        return view(
            'functions-for-almost-equal.reading-resources.book.copie.buttons'
            ,
            [
                'not_loaned' => $not_loaned ?? 0,
                'loane' => $loane ?? 0,
                'slug'=>$slug
            ]
        );
    }


    public function borrowedCopies($slug)
    {

        $book = Book::where('slug', $slug)->first();


        $copies = Copie::Select('book_id', 'type_state_id', 'acquisition_date', 'slug', 'location')
            ->where("book_id", $book->book_id)
            ->whereNot('type_state_id',2)
            ->with([
                'book' => function ($query) {
                    $query->select('book_id', 'title', 'author_id')
                        ->with([
                            'author' => function ($query) {
                                $query->select('author_id', 'author'); // Selecciona las columnas necesarias de Author
                            }
                        ]);
                },
                'typeState' => function ($query) {
                    $query->select('type_state_id', 'type_state');
                }
            ])
            ->paginate(10);


       
        return view(
            'functions-for-almost-equal.reading-resources.book.copie.not-loaned.show-all'
            ,
            [
                'title' => $book->title,
                'copies' => $copies,
            ]
        );
    }
}
