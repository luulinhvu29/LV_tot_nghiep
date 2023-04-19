<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;
use App\Services\Blog\BlogServiceInterface;
use App\Services\Product\ProductServiceInterface;
use Illuminate\Http\Request;

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
}
