<?php

namespace App\Http\Controllers;

use App\Banner;
use App\brand;
use App\Category; // cần thêm dòng này nếu chưa có
use App\Product;
use App\Rating;
use App\User;
use Illuminate\Http\Request;
use Cart;
use DB;

class ShopController extends GeneralController
{

    public function __construct()
    {
        parent::__construct();
    }

    // trang chủ
    public function index()
    {
        $brand = brand::all();
        $carts = Cart::content();
        $categories = $this->categories;

        // 3. Lấy danh sách phẩm theo thể loại
        $list = []; // chứa danh sách sản phẩm  theo thể loại

        foreach($categories as $key => $category) {
            if($category->parent_id == 0) { // check danh mục cha
                $ids = [$category->id]; // $ids = array($category->id);

                foreach($categories as $child) {
                    if ($child->parent_id == $category->id) {
                        $ids[] = $child->id; // thêm phần tử vào mảng
                    }
                } // ids = [1,7,8,9,..]

                // $list[$key]['brand'] = Brand::all();


                $list[$key]['category'] = $category;
                $list[$key]['products'] = Product::where(['is_active' => 1])
                                                ->whereIn('category_id' , $ids)
                                                ->limit(10)->orderBy('id', 'desc')
                                                ->get();
                                                                
            }
        }

        return view('shop.home',[
            'list' => $list,
            'carts' => $carts,
            'brand' =>$brand,
        ]);
    }

    // Get san phan theo the loai
    public function getProductsByCategory($slug)
    {
        // step 1 : lấy chi tiết thể loại
        $cate = Category::where(['slug' => $slug])->first();
        // dd($cate);
        $brand = brand::all();


        if ($cate) {
            $categories = $this->categories;
            // step 1.1 Check danh mục cha -> lấy toàn bộ danh mục con để where In
            $ids = [];
            foreach($categories as $key => $category) {
                if($category->id == $cate->id) {
                    $ids[] = $cate->id;

                    foreach ($categories as $child) {
                        if ($child->parent_id == $cate->id) {
                            $ids[] = $child->id; // thêm phần tử vào mảng
                        }
                    }
                }
            }

            // step 2 : lấy list sản phẩm theo thể loại
            $products = Product::where(['is_active' => 1, 'is_hot' => 0])
                                    ->whereIn('category_id' , $ids)
                                    ->limit(10)->orderBy('id', 'desc')
                                    ->get();

            return view('shop.products-by-category',[
                'category' => $category,
                'products' => $products,
                'cate' => $cate,
                'brand' => $brand
            ]);
        } else {
            return $this->notfound();
        }
    }

    public function getProduct(Request $request, $category , $slug , $id)
    {
        // step 1 : lấy chi tiết thể loại
        $category = Category::where(['slug' => $category])->first();
        $rating = Rating::all();
        $url = $request->url();

        if (!$category) {
            return $this->notfound();
        }
        // get chi tiet sp
        $product = Product::find($id);
        if (!$product) {
            return $this->notfound();
        }

        $hot = Product::where([
            'is_active' => 1,
            'is_hot' => 1
        ])->orderBy('id', 'desc')->paginate(4);

        // step 2 : lấy list SP liên quan
        $relatedProducts = Product::where([
                                ['is_active' , '=', 1],
                                ['category_id', '=' , $category->id ],
                                ['id', '<>' , $id]
                            ])->orderBy('id', 'desc')->paginate(5);

        $total_point = Rating::where('product_id', $id)->orderBy('point', 'DESC')->selectRaw('point, id,product_id, count(point) as sum_point')->groupBy('point')->get()->toArray();

        return view('shop.product',[
            'category' => $category,
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'url' => $url,
            'hot' => $hot,
            'rating' => $rating,
            'total_point' => $total_point
        ]);
    }

    public function getSearch(Request $request){
        $data = $request->timkiem;

        if ($request->catsearch) {
            $result = $request->catsearch;
            switch ($result) {
                case '13':
                    $search = Product::where([
                        ['is_active' , '=', 1],
                        ['category_id' , '=', 13]
                    ])->paginate(8);

                    break;
                case '14':
                    $search = Product::where([
                        ['is_active' , '=', 1],
                        ['category_id' , '=', 14]
                    ])->paginate(8);
                    break;
                default:
                    # code...
                    break;
            }
        }

        //$sql = "SELECT * FROM products WHERE is_active = 1 AND (name like '%?%' OR slug like '%?%' OR summary like '%?%')";
        //$results = DB::select($sql, [
        //    $keyword, $slug , $keyword
        //]);
        
        // $a = str_replace(' ', '%', $data);
        $search = Product::where([
            ['slug','like','%'.str_slug($data).'%'],
            ['is_active' , '=', 1]
        ])->paginate(8);


        return view('shop.search',[
            'data' => $data,
            'search' => $search,
            
        ]);
    }

    public function getslug($category,$slug)
    { 
        $category = Category::where(['slug' => $slug])->first();
        
        $products = Product::where(['is_active' => 1, 'category_id'=>$category->id])
                            ->limit(8)->orderBy('id', 'desc')
                            ->get();

        return view('shop.slug',[
            'products' => $products,
            'category' => $category,
            
        ]);
    }
}
    