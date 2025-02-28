<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\producttype;
use App\Models\productgenre;
use App\Models\productSegment;
use App\Models\subcategories;
use App\Models\Brand;
use App\Models\HomepageCarouselImages;

use Illuminate\Http\Request;

class Frontend extends Controller
{
    public function shop( ){
        $products= Products::all();
        $producttypes= producttype::all();
        $productgenres= productgenre::all();
        $productSegment= productSegment::all();
        $subcategories= subcategories::all();
        $HomepageCarouselImages= HomepageCarouselImages::all();
        $Brand= Brand::all();
        $data = [
            'products' => $products,
            'producttypes' => $producttypes,
            'productgenres' => $productgenres,
            'productSegment' => $productSegment,
            'subcategories' => $subcategories,
            'HomepageCarouselImages' => $HomepageCarouselImages,
            'Brand' => $Brand,
        ];

        return view('index',['Data'=>$data]);

    }


    public function product_list( ){
        $segmentlist = [];

        $products= Products::all();
        $producttypes= producttype::all();
        $productgenres= productgenre::all();
        $productSegment= productSegment::all();
        $subcategories= subcategories::all();
        $HomepageCarouselImages= HomepageCarouselImages::all();
        $Brand= Brand::all();
        $data = [
            'products' => $products,
            'producttypes' => $producttypes,
            'productgenres' => $productgenres,
            'productSegment' => $productSegment,
            'subcategories' => $subcategories,
            'HomepageCarouselImages' => $HomepageCarouselImages,
            'Brand' => $Brand,
            'segmentlist' => $segmentlist,

        ];

        return view('product_list',['Data'=>$data]);

    }

    public function subcategory($id)
    {
        // Retrieve the subcategory by its id
        $subcat = subcategories::find($id);

        // If the subcategory is not found, abort with a 404 error
        if (!$subcat) {
            abort(404, 'Subcategory not found');
        }

        $segmentlist = [];

        // Check if foreignkey_productsegment_iD is an array before looping
        if (is_array($subcat->foreignkey_productsegment_iD)) {
            foreach ($subcat->foreignkey_productsegment_iD as $prodsegment) {
                $segment = ProductSegment::find($prodsegment);
                if ($segment) {
                    $segmentlist[] = $segment;
                }
            }
        }

        // Fetch all necessary data
        $data = [
            'products' => Products::all(),
            'producttypes' => producttype::all(),
            'productgenres' => productgenre::all(),
            'productSegment' => productSegment::all(),
            'subcategories' => subcategories::all(),
            'HomepageCarouselImages' => HomepageCarouselImages::all(),
            'Brand' => Brand::all(),
            'selectedSection'=> $id,
            'segmentlist' => $segmentlist,
        ];

        // Pass the data to the view
        return view('product_list', ['Data' => $data]);
    }

}
