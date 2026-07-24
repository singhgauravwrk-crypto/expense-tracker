<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{

    protected $fillable = [

        'category_id',
        'budget_id',
        'amount',
        'description',
        'expense_date',
        'receipt'

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }

}