<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class BooksController extends Controller
{
    //

    private $books;

    function __construct(Book $books)
    {
        $this->books = $books;
    }

    public function index($id) {
        $book = $this->books->find($id);

        if($book) {
            return response()->json(new BookResource($book));
        } else {
            return response()->json(['message' => 'Book not found'], 404);
        }
    }

    public function list() {
        $books = $this->books->latest()->paginate(20);

        return response()->json(new BookCollection($books));
    }


    public function store(BookRequest $request) {

        $file_url = null;

        if($request->file()) {
           $file_url = $this->handleUpload($request->file('cover_image'));
        }

        $data = $request->only('title', 'description', 'amount', 'isbn', 'author');
        
        $data['seller_id'] = 1; //This is hard-coded since we are not using authentication at the moment.
        $data['image_url'] = $file_url;

        $book = $this->books->create($data);
        

        return new BookResource($book);

    }


    public function update(BookRequest $request, $id) {

        $book = $this->books->find($id);

        if(!$book) {
            return response()->json(['message' => 'Book record does not exist'], 404);
        }

        $file_url = null;

        if($request->file()) {
           $file_url = $this->handleUpload($request->file('cover_image'));
        }

        $data = $request->only('title', 'description', 'amount', 'isbn', 'author');
        
        $data['image_url'] = $file_url ? $file_url : $book->image_url;

        $book->update($data);
        
        return new BookResource($book);

    }

    
    public function delete() {

    }


    private function handleUpload($file) {

            $file_path = $file->store('uploads', 'public');

            return env('APP_URL') . '/storage/' . $file_path;
    }

}
