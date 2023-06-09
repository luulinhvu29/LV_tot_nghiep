<?php

namespace App\Providers;

use App\Repositories\Address\AddressRepository;
use App\Repositories\Address\AddressRepositoryInterface;
use App\Repositories\Authority\AuthorityRepository;
use App\Repositories\Authority\AuthorityRepositoryInterface;
use App\Repositories\Blog\BlogRepository;
use App\Repositories\Blog\BlogRepositoryInterface;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Brand\BrandRepositoryInterface;
use App\Repositories\City\CityRepository;
use App\Repositories\City\CityRepositoryInterface;
use App\Repositories\District\DistrictRepository;
use App\Repositories\District\DistrictRepositoryInterface;
use App\Repositories\EnterCoupon\EnterCouponRepository;
use App\Repositories\EnterCoupon\EnterCouponRepositoryInterface;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailRepository;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\ProductCategory\ProductCategoryRepository;
use App\Repositories\ProductCategory\ProductCategoryRepositoryInterface;
use App\Repositories\ProductComment\ProductCommentRepository;
use App\Repositories\ProductComment\ProductCommentRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Ward\WardRepository;
use App\Repositories\Ward\WardRepositoryInterface;
use App\Services\Address\AddressService;
use App\Services\Address\AddressServiceInterface;
use App\Services\Authority\AuthorityService;
use App\Services\Authority\AuthorityServiceInterface;
use App\Services\Blog\BlogService;
use App\Services\Blog\BlogServiceInterface;
use App\Services\Brand\BrandService;
use App\Services\Brand\BrandServiceInterface;
use App\Services\City\CityService;
use App\Services\City\CityServiceInterface;
use App\Services\District\DistrictService;
use App\Services\District\DistrictServiceInterface;
use App\Services\EnterCoupon\EnterCouponService;
use App\Services\EnterCoupon\EnterCouponServiceInterface;
use App\Services\Order\OrderService;
use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailService;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceInterface;

use App\Repositories\ProductDetail\ProductDetailRepository;
use App\Repositories\ProductDetail\ProductDetailRepositoryInterface;


use App\Services\ProductCategory\ProductCategoryService;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use App\Services\ProductComment\ProductCommentService;
use App\Services\ProductComment\ProductCommentServiceInterface;
use App\Services\ProductDetail\ProductDetailService;
use App\Services\ProductDetail\ProductDetailServiceInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use App\Services\Ward\WardService;
use App\Services\Ward\WardServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Product
        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->singleton(
            ProductServiceInterface::class,
            ProductService::class
        );

        //ProductCommentService
        $this->app->singleton(
            ProductCommentRepositoryInterface::class,
            ProductCommentRepository::class
        );

        $this->app->singleton(
            ProductCommentServiceInterface::class,
            ProductCommentService::class
        );

        //Blog
        $this->app->singleton(
            BlogRepositoryInterface::class,
            BlogRepository::class
        );

        $this->app->singleton(
            BlogServiceInterface::class,
            BlogService::class
        );

        //ProductCategory
        $this->app->singleton(
            ProductCategoryRepositoryInterface::class,
            ProductCategoryRepository::class
        );

        $this->app->singleton(
            ProductCategoryServiceInterface::class,
            ProductCategoryService::class
        );

        //Brand
        $this->app->singleton(
            BrandRepositoryInterface::class,
            BrandRepository::class
        );

        $this->app->singleton(
            BrandServiceInterface::class,
            BrandService::class
        );

        //Order
        $this->app->singleton(
            OrderRepositoryInterface::class,
            OrderRepository::class
        );

        $this->app->singleton(
            OrderServiceInterface::class,
            OrderService::class
        );

        //OrderDetail
        $this->app->singleton(
            OrderDetailRepositoryInterface::class,
            OrderDetailRepository::class
        );

        $this->app->singleton(
            OrderDetailServiceInterface::class,
            OrderDetailService::class
        );

        //ProductDetail
        $this->app->singleton(
            ProductDetailRepositoryInterface::class,
            ProductDetailRepository::class
        );

        $this->app->singleton(
            ProductDetailServiceInterface::class,
            ProductDetailService::class
        );

        //Authority
        $this->app->singleton(
            AuthorityRepositoryInterface::class,
            AuthorityRepository::class
        );

        $this->app->singleton(
            AuthorityServiceInterface::class,
            AuthorityService::class
        );

        //EnterCoupon
        $this->app->singleton(
            EnterCouponRepositoryInterface::class,
            EnterCouponRepository::class
        );

        $this->app->singleton(
            EnterCouponServiceInterface::class,
            EnterCouponService::class
        );

        //Address
        $this->app->singleton(
            AddressRepositoryInterface::class,
            AddressRepository::class
        );

        $this->app->singleton(
            AddressServiceInterface::class,
            AddressService::class
        );

        //City
        $this->app->singleton(
            CityRepositoryInterface::class,
            CityRepository::class
        );

        $this->app->singleton(
            CityServiceInterface::class,
            CityService::class
        );

        //District
        $this->app->singleton(
            DistrictRepositoryInterface::class,
            DistrictRepository::class
        );

        $this->app->singleton(
            DistrictServiceInterface::class,
            DistrictService::class
        );

        //Ward
        $this->app->singleton(
            WardRepositoryInterface::class,
            WardRepository::class
        );

        $this->app->singleton(
            WardServiceInterface::class,
            WardService::class
        );

        //User
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->singleton(
            UserServiceInterface::class,
            UserService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
