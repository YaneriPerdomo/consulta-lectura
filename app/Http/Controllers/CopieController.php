<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Copie;
use App\Models\TypeState;
use Date;
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
        $lost_or_damaged = 0;
        $loane = 0;
        $under_repair = 0;
        foreach ($stateCounts as $key => $value) {

            if ($value->type_state == 'Dañado' || $value->type_state == 'Extraviado') {
                $lost_or_damaged = $lost_or_damaged + $value->count;
            }

            if ($value->type_state == 'Disponible') {
                $not_loaned = $not_loaned + $value->count;
            }

            if($value->type_state == 'En Reparación'){
                $under_repair = $under_repair + $value->count;
            }


            if ($value->type_state == 'Prestado') {
                $loane = $loane + $value->count;
            }

        }

        return view(
            'functions-for-almost-equal.reading-resources.book.copie.buttons'
            ,
            [
                'not_loaned' => $not_loaned ?? 0,
                'loane' => $loane ?? 0,
                'lost_or_damaged' => $lost_or_damaged,
                'slug' => $slug,
                'under_repair' => $under_repair
            ]
        );
    }


    public function borrowedCopies($slug)
    {

        $book = Book::where('slug', $slug)->first();


        $copies = Copie::Select('book_id', 'type_state_id', 'acquisition_date', 'slug', 'location')
            ->where("book_id", $book->book_id)
            ->whereNotIn('type_state_id', [2, 4, 5, 3])
            ->with([
                'book' => function ($query) {
                    $query->select('book_id', 'title', 'author_id')
                        ->with([
                            'author' => function ($query) {
                                $query->select('author_id', 'author');  
                            }
                        ]);
                },
                'typeState' => function ($query) {
                    $query->select('type_state_id', 'type_state');
                }
            ])
            ->paginate(7);



        return view(
            'functions-for-almost-equal.reading-resources.book.copie.not-loaned.show-all'
            ,
            [
                'title' => $book->title,
                'copies' => $copies,
                'slug' => $slug
            ]
        );
    }


    public function createCopies($slug)
    {

        $types_state = TypeState::all();
        return view(
            'functions-for-almost-equal.reading-resources.book.copie.create'
            ,
            compact('slug', 'types_state')
        );
    }

    public function store(Request $request, $slug)
    {

        $book = Book::where('slug', $slug)->first();
        for ($i = 0; $i < $request->amount; $i++) {
            $copie = Copie::create([
                'book_id' => $book->book_id,
                'location' => $request->location,
                'acquisition_date' => $request->acquisition_date ?? Date('Y-m-d'),
                'type_state_id' => $request->type_state_id,
            ]);

            $copie->save();

            $copie_id = $copie->copie_book_id;


            $copie->slug = $slug . '-' . $copie_id;

            $copie->save();

        }
        return $request;
    }

    public function edit($slug){
        $types_state = TypeState::whereNot('type_state', 2)->get();

        $copie = Copie::where('slug', $slug)->first();

        
        return view(
            'functions-for-almost-equal.reading-resources.book.copie.not-loaned.edit', [
                'types_state' => $types_state,
                'copie' => $copie,
                'slug' => $slug
            ]
        );
    }

    public function update(Request $request, $slug){

        $copie_update = Copie::where('slug', $slug)->first();

        $copie_update->update([
            'location' => $request->location,
            'type_state_id' => $request->type_state_id,
            'notes' => $request->notes,
        ]);

        return $request;
    }
}
