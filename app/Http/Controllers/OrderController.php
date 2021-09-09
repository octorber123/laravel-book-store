<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Gate;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    /**
     * Display a the cart for the customer and order list for staff
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    //inner joining the orders and users table
    //this is like a pivot tablet (book_order)
    $orders = DB::table('orders')
    ->select(DB::raw("orders.*, books.*, orders.id as order_id",))
    ->join('books','orders.book_id','books.id')
    ->get();

    if((Gate::allows('isStaff'))&& Auth::check()) {
       return view('orders.indexStaff', compact('orders'));
     }
    else if((!(Gate::allows('isStaff')))&& Auth::check()) {
       return view('orders.indexCustomer', compact('orders'));
     } else {
    return redirect()->back();
     }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created order in storage.
     * if the order already exsists the quantity of the order is updated
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //validate request to ensure all fields are within requrement
      $order = $this->validate(request(), [
            'quantity' => 'numeric',
            'price' => 'numeric',
            'status' => 'numeric',
            ]);

      //checks if an order lisiting exsists if it does it will increment the quantity instead of adding a repeated lisitng.
      $bookid = $request->input('book_id');
        $checkOrder= Order::where('customer_id', '=', Auth::id())
       ->where('book_id', $bookid)
       ->where('status', 0)
       ->first();

      if($checkOrder != null){
       return $this->update($request, $checkOrder->id );
     } else {

       $order = new Order;
       $order->customer_id = Auth::id();
       $order->book_id =$request->input('book_id');
       $order->quantity = $request->input('quantity');

       //calculate total Price
       $price = $request->input('price');
       $quantity = $order->quantity ;
       $totalPrice = $quantity * $price;

       $order->total_payable = $totalPrice;

       $order->save();
      return redirect('books')->with('success','Book has been add to the cart');
     }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      //check status if add to cart is 1 is not null then that means an order is being placed
      //so then an order's status is updated and a checkout view is retured
      if ($request->input('add_to_cart') != null) {
        $order = Order::find($id);
        $order->status = 1;
        $order->updated_at = now();
        $order->save();
        return view('orders.checkout', compact('order'));
      } else {

        $order= Order::find($id);
        //find price per books
        $pricePerBook = $order->total_payable / $order->quantity;
        //enter new qunatity
        if ($request->input('quantity_override') != null) {
          $order->quantity = $request->input('quantity_override');
        } else {
          $order->quantity = $order->quantity + $request->input('quantity');
        }
        //update new total_payable
        $order->total_payable = $pricePerBook * $order->quantity;

        $order->updated_at = now();
        $order->save();

        return redirect('orders')->with('success','Order quantity has been updated');

      }

    }

    /**
     * Remove the specified order from cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete a book from the orders
        DB::table('orders')->where('id','=', $id)->delete();
        return redirect('orders')->with('success', 'Book has been removed');
    }

    /**
     * Update the order status and deduct order quantity from stock.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

  }
