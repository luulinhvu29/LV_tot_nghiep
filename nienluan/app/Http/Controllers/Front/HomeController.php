<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;
use App\Services\Blog\BlogServiceInterface;
use App\Services\Product\ProductServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    //

    private $productService;
    private $blogSerVice;

    public function __construct(ProductServiceInterface $productService, BlogServiceInterface $blogSerVice)
    {
        $this->productService = $productService;
        $this->blogSerVice = $blogSerVice;
    }

    public function index(){

        $featuredProducts = $this->productService->getFeaturedProducts();

        $blogs = $this->blogSerVice->getLatestBlogs();

        return view('front.index', compact('featuredProducts','blogs'));
    }

    public function faq(){
        return view('front.faq');
    }

    public function blog_dt(){
        return view('front.blog');
    }

    public function contact(){
        return view('front.contact');
    }

    public function postContact(Request $request){
        $email_from = $request->email;
        $content = $request->message;
        $name = $request->name;

        $this->sendEmail($content, $name, $email_from);

        return back();
    }

    public function sendEmail($content, $name, $email){

        $email_from = $email;

        Mail::send('front.email', compact('content','name'),
            function ($message) {
                $message->from('linhvu29112001@gmail.com', 'Linh Vu Shop');
                $message->to('linhvu29112001@gmail.com', 'Linh Vu Shop');
                $message->subject('Report');
            }
        );

    }
}
