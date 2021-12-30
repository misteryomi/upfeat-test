<?php

namespace App\Http\Controllers;


use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class BooksController extends Controller
{
    private $books;

    function __construct(Book $books)
    {
        $this->books = $books;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->books->latest()->paginate(20);

        return response()->json(['data' => new BookCollection($books), 'status' => true], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request) {

        $file_url = null;

        if($request->file()) {
           $file_url = $this->handleUpload($request->file('cover_image'));
        }

        $data = $request->only('title', 'description', 'amount', 'isbn', 'author');
        
        $data['seller_id'] = 1; //This is hard-coded since we are not using authentication at the moment.
        $data['image_url'] = $file_url;

        $book = $this->books->create($data);
        

        return response()->json(['data' => new BookResource($book), 'status' => true], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->books->find($id);

        if($book) {
            return response()->json(['data' => new BookResource($book), 'status' => true], 200);
        } else {
            return response()->json(['message' => 'Book not found', 'status' => false], 404);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id) {


        $book = $this->books->find($id);

        if(!$book) {
            return response()->json(['message' => 'Book record does not exist', 'status' => false], 404);
        }

        $file_url = null;

        if($request->file()) {
           $file_url = $this->handleUpload($request->file('cover_image'));
        }

        $data = $request->only('title', 'description', 'amount', 'isbn', 'author');
        
        $data['image_url'] = $file_url ? $file_url : $book->image_url;

        $book->update($data);
        
        return response()->json(['data' => new BookResource($book), 'status' => true], 200);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = $this->books->find($id);

        if(!$book) {
            return response()->json(['message' => 'Book record does not exist', 'status' => false], 404);
        }

        $book->delete();

        return response()->json(['message' => 'Book deleted successfully', 'status' => true], 200);
    }


    private function handleUpload($file) {

        $file_path = $file->store('uploads', 'public');

        return env('APP_URL') . '/storage/' . $file_path;
    }    
}
