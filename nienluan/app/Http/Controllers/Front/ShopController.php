<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductComment;
use App\Models\User;
use App\Services\BaseService;
use App\Services\Brand\BrandServiceInterface;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductComment\ProductCommentServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    //

    private $productService;
    private $productCommentService;
    private $productCategoryService;
    private $brandService;

    public function __construct(ProductServiceInterface $productService,
                                ProductCommentServiceInterface $productCommentService,
                                ProductCategoryServiceInterface $productCategoryService,
                                BrandServiceInterface $brandService)
    {
        $this->productService = $productService;
        $this->productCommentService = $productCommentService;
        $this->productCategoryService = $productCategoryService;
        $this->brandService = $brandService;

    }

    public function show($id)
    {
        //Get categories, brands:
        $categories = $this->productCategoryService->all();
        $brands = $this->brandService->all();

        $product = $this->productService->find($id);
        $relatedProducts = $this->productService->getRelatedProducts($product);

        $cart = Cart::content()->where('id', $id)->first();

        return view('front.shop.show', compact('product','categories','brands','relatedProducts','cart'));
    }

    public function postComment(Request $request){
        $this->productCommentService->create($request->all());

        return redirect()->back();
    }

    public function index(Request $request){

        //Get categories, brands:
        $categories = $this->productCategoryService->all();
        $brands = $this->brandService->all();

        $products = $this->productService->getProductOnIndex($request);


        return view('front.shop.index', compact('categories','brands','products'));
    }

    public function category($categoryName, Request $request){
        $categories = $this->productCategoryService->all();
        $products = $this->productService->getProductsByCategory($categoryName, $request);

        $brands = $this->brandService->all();


        return view('front.shop.index', compact('categories','brands','products'));
    }

    public function show1($id)
    {
        //Get categories, brands:
        $categories = $this->productCategoryService->all();
        $brands = $this->brandService->all();

        $product = $this->productService->find($id);
        $relatedProducts = $this->productService->getRelatedProducts($product);

        $cart = Cart::content()->where('id', $id)->first();


        return view('front.shop.show1', compact('product','categories','brands','relatedProducts','cart'));
    }

    public function show2($id)
    {
        //Get categories, brands:
        $categories = $this->productCategoryService->all();
        $brands = $this->brandService->all();

        $product = $this->productService->find($id);
        $relatedProducts = $this->productService->getRelatedProducts($product);

        $cart = Cart::content()->where('id', $id)->first();


        return view('front.shop.show2', compact('product','categories','brands','relatedProducts','cart'));
    }

    public function show3($id)
    {
        //Get categories, brands:
        $categories = $this->productCategoryService->all();
        $brands = $this->brandService->all();

        $product = $this->productService->find($id);
        $relatedProducts = $this->productService->getRelatedProducts($product);

        $cart = Cart::content()->where('id', $id)->first();


        return view('front.shop.show3', compact('product','categories','brands','relatedProducts','cart'));
    }

    public function show4($id)
    {
        //Get categories, brands:
        $categories = $this->productCategoryService->all();
        $brands = $this->brandService->all();

        $product = $this->productService->find($id);
        $relatedProducts = $this->productService->getRelatedProducts($product);

        $cart = Cart::content()->where('id', $id)->first();


        return view('front.shop.show4', compact('product','categories','brands','relatedProducts','cart'));
    }

}
