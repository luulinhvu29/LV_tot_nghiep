<?php

namespace App\Repositories\ProductDetail;

use App\Models\ProductDetail;

use App\Repositories\BaseRepository;
use Illuminate\Http\Request;

class ProductDetailRepository extends BaseRepository implements ProductDetailRepositoryInterface
{

    public function getModel()
    {
        return ProductDetail::class;
    }

    public function getProductDetailBySize($size, $productId){

        return $this->model->where('product_id', $productId)
            ->where('size', $size)
            ->limit(1)
            ->get();
    }

}
