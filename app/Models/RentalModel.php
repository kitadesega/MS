<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RentalModel extends Model
{
    public function rental($userId,$bookId,$returnDate){
        DB::table('rental')
            ->insert([
                'user_id' => $userId,
                'book_id' => $bookId,
                'return_date' => $returnDate,
                'created_at' => now(),
                'updated_at' => now()
            ]);
    }
}
