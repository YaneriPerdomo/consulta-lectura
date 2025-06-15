<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Editorial;
use App\Models\Language;
use Auth;
use Illuminate\Http\Request;

class EmployeeBookController extends Controller
{
    public function index()
    {

        $books = Book::paginate(10);


        return view(
            'functions-for-almost-equal.reading-resources.book.show-all',
            ['data_books' => $books]
        );
    }

    public function create()
    {

        $languages = Language::select('language', 'language_id')->get();
        $authors = Author::select('author', 'author_id')->get();
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

    public function store(Request $request)
    {


        $slug = converter_slug($request->title);

        $insert_book = new Book();

        $insert_book->title = $request->title;
        $insert_book->employee_id = Auth::user()->employee->employee_id;
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
        $insert_book->room_id = Auth::user()->employee->room_id;
        $insert_book->save();

        return redirect('recursos-de-lectura/libros')
            ->with('alert-success', 'El libro ha sido registrado exitosamente');
    }

    public function edit($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $languages = Language::select('language', 'language_id')->get();
        $authors = Author::select('author', 'author_id')->get();
        $editorials = Editorial::select('editorial', 'editorial_id')->get();

        return view(
            'functions-for-almost-equal.reading-resources.book.edit'
            ,
            [
                'book' => $book,
                'languages' => $languages,
                'authors' => $authors,
                'editorials' => $editorials
            ]
        );
    }

    public function update(Request $request, $url_slug)
    {
        $update_book = Book::where('slug', operator: $url_slug)->first();


        $update_slug = converter_slug($request->title);

        $update_book->title = $request->title;
        $update_book->sub_title = $request->sub_title;
        $update_book->description = $request->description;
        $update_book->image_path = $request->image_path;
        $update_book->author_id = $request->author_id;
        $update_book->editorial_id = $request->editorial_id;
        $update_book->language_id = $request->language_id;
        $update_book->publication_date = $request->publication_date;
        $update_book->ISBN = $request->isbn;
        $update_book->page_number = $request->page_number;
        $update_book->translator = $request->translator_name;
        $update_book->slug = $update_slug;
        $update_book->save();

        return redirect('recursos-de-lectura/libro/' . $update_slug . '/editar')
            ->with('alert-success', 'El libro ha sido actualizado exitosamente');
    }
}
