<?php

namespace App\Http\Controllers;

use App\Models\BooksModel;
use App\Models\RentalModel;
use App\Models\ReviewModel;
use GoogleTranslate\GoogleTranslate;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function show($bookId){
        $bookModel = new BooksModel();
        $reviewModel = new ReviewModel();
        $rentalModel = new RentalModel();
        $book = $bookModel->getBooksFirst($bookId);

        $indexBooks = $bookModel->indexBooks();

        //英語に翻訳
        $book->enDetail = $this->translation($book->detail);
        $book->enTitle = $this->translation($book->title);
        $book->enPublisher = $this->translation($book->publisher);
        $book->enAuther = $this->translation($book->auther);

        $book->returnDay = '';
        if($book->rental_flag === 1) {
            $book->returnDay = $rentalModel->returnDay($book->id);
        }
//        $book->starAvg = $reviewModel->getAvgRank($book->id);
        $book->reviewCount = $reviewModel->getReviewCount($book->id);

        $reviews = $reviewModel->getReviewAndScoreForBookId($book->id);
        $sortReviews = $reviews->sortByDesc('score')->values();
        //最少スコアと最大スコアのレビューを取得
        $LowScoreReview = $sortReviews->first();
        $HighScoreReview = $sortReviews->last();

        return view('book.show',[
            'book' => $book,
            'LowScoreReview' => $LowScoreReview,
            'HighScoreReview' => $HighScoreReview,
            'indexBooks' => $indexBooks
        ]);
    }

    public function translation($text){
        $from = "ja"; // English
        $to   = "en"; // 日本語
        $st = new GoogleTranslate($text, $from, $to);
        return $st->exec();
    }




}
