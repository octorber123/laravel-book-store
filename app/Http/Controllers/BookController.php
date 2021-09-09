<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Book;
use Gate;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display all the books in the aston book store,
     * sorted by latest addition
     * checks are made to ensure that uses of certain access rights ae directed to their views.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $books = Book::latest()->get();

       if ((Gate::allows('isStaff') && Auth::check()) ) {
          return view('books.index', compact('books'));

       } else if((!(Gate::allows('isStaff')))&& Auth::check()) {
          return view('books.indexCustomer', compact('books'));

        } else{
          return view('books.indexPublic', compact('books'));
        }
    }

    /**
     * Show the form for adding a new book to database.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if ((Gate::allows('isStaff') && Auth::check()) ) {
           return view('books.create');
      }else {
      return redirect()->back();
      }

    }

    /**
     * Store a newly created Book in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //validate request to ensure all fields are within requrement
      $book = $this->validate(request(), [
            'title' => 'required',
            'price' => 'required',
            'author' => 'required',
            'category' => 'required',
            'publish_year' => 'required',
            'stock' => 'required',
            //restric image formats and max size
            'cover_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            ]);
            //Handles the uploading of the image
            if ($request->hasFile('cover_image')){
              //Gets the filename with the extension
              $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
              //just gets the filename
              $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
              //Just gets the extension
              $extension = $request->file('cover_image')->getClientOriginalExtension();
              //Gets the filename to store
              $fileNameToStore = $filename.'_'.time().'.'.$extension;
              //Uploads the image
              $path =$request->file('cover_image')->storeAs('public/storage/images', $fileNameToStore);
              }
            else {
            $fileNameToStore = 'noimage.jpg';
            }
        //create a book and store values from create form to database
        $book = new Book;
        $book->title = $request->input('title');
        $book->category = $request->input('category');
        $book->price = $request->input('price');
        $book->author = $request->input('author');
        $book->publish_year = $request->input('publish_year');
        $book->stock = $request->input('stock');
        $book->cover_image =  $fileNameToStore;


        $book->save();

          return back()->with('success', 'Book has been added');
    }

    /**
     * Display the book details.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find the book by id and open details
        $book = Book::find($id);
        return view('books.show', ['book'=>$book]);

    }

    /**
     * Show the form for adding stock to the specified book.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $book = Book::find($id);

        if ((Gate::allows('isStaff') && Auth::check()) ) {
             return view('books.edit',compact('book'));
        } else {
          return redirect()->back();
        }

    }

    /**
     * Update the specified book stock in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Update book stock
        $book = Book::find($id);
        $this->validate(request(), [
        'stock' => 'required',
        ]);
          $book->stock = $book->stock + $request->input('stock');
          $book->updated_at = now();
          $book->save();
          return redirect()->back()->with('success','Book stock updated');

    }

    /**
     * Remove the specified book from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
