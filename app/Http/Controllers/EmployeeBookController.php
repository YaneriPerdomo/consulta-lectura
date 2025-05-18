<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Editorial;
use App\Models\Language;
use Illuminate\Http\Request;

class EmployeeBookController extends Controller
{
    public function index()
    {

        return view(
            'functions-for-almost-equal.reading-resources.book.show-all'
        );
    }

    public function create()
    {


        $languages = Language::select('language', 'language_id')->get();
        $authors = Author::select('author','author_id')->get();
        $editorials = Editorial::select('editorial', 'editorial_id')->get();




        return view(
            'functions-for-almost-equal.reading-resources.book.create',
            [
                'languages' => $languages,
                'authors' => $authors,
                'editorials' => $editorials
            ]
        );
    }

    public function store(Request $request){

        $slug = converter_slug($request->title);

        $insert_book = new Book();
        
        $insert_book->title = $request->title;
        $insert_book->sub_title = $request->sub_title;
        $insert_book->description = $request->description;
        $insert_book->image_path = $request->image_path;
        $insert_book->author_id = $request->author_id;
        $insert_book->editorial_id = $request->editorial_id;
        $insert_book->language_id = $request->language_id;
        $insert_book->publication_date = $request->publication_date;
        $insert_book->ISBN = $request->isbn;
        $insert_book->page_number = $request->page_number;
        $insert_book->translator = $request->translator_name;
        $insert_book->slug = $slug;
        $insert_book->save();

        return $request;
    }
}
