<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category; // cần thêm dòng này nếu chưa có
use App\Product;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    protected $categories;

    public function __construct()
    {
        // 1. Lấy dữ liệu - Danh mục sản phẩm
        $categories = Category::where('is_active' ,1)->get();
        // 2. Lấy dữ liệu - Banner
        $banners = Banner::where('is_active' , 1)->get();

        $brands = Banner::where('id' , 6)->get();

        $this->categories = $categories;
        $this->brands = $brands;

        view()->share(['categories' => $categories, 'banners' => $banners, 'brands' => $brands]);
    }

    public function notfound()
    {
        return view('shop.notfound');
    }
}
