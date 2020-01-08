<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {
    public $timestamps = false;

    protected $fillable = [
        'created_at', 'borrowed_at', 'lender_id', 'borrower_id', 'title', 'author', 'genre', 'description', 'cover', 'status'
    ];

    protected $with = ['lender', 'borrower'];

    public function lender() {
        return $this->makeHidden('books')->belongsTo(User::class, 'lender_id', 'id');
    }

    public function borrower() {
        return $this->makeHidden('books')->belongsTo(User::class, 'borrower_id', 'id');
    }
}
