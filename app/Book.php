<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //to cast the category in to array and back to json
    protected $casts =[
      'category'=> 'array'
    ];
//allows staff to mass assign these values
    protected $fillable = [
      'title', 'author'
    ];
//when updating stock or price it should be exempt form mass assignment to enure the values are correct
    protected $guarded = [
      'price', 'stock'
    ];

}
