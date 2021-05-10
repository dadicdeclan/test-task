<?php

namespace App\Http\Controllers;

use App\Models\modProducts;
use Illuminate\Http\Request;

class controllerFrontend extends Controller
{
    public function index(){
        $get_all_products =  modProducts::paginate(10);
        return view('index',compact('get_all_products'));
    }

    public function query_products(Request $request){
        //get order by parameters
        if(!$request){
            return response()->json('Bad request', 400);
        }
        $viewMode = $request->input('view_mode');
        switch ( $viewMode ) {
            case "price_desc":
             $orderColumn = 'productPrice';
             $orderList = 'desc';
                break;
            case "price_asc":
                $orderColumn = 'productPrice';
                $orderList = 'asc';
                break;
            case "name_desc":
                $orderColumn = 'productName';
                $orderList = 'desc';
                break;
            case "name_asc":
                $orderColumn = 'productName';
                $orderList = 'asc';
                break;
            default:
                $orderColumn = 'id';
                $orderList = 'asc';
        }

        // First way to query
        $get_products = modProducts::whereHas('productAssignedCategory', function ($query) use ($request) {
            $query->where('categoryName', 'like', "%{$request->search}%")
                    ->where('isActive',1);
        })
            ->orwhere('productName','like',"%{$request->search}%")
            ->orderBy($orderColumn, $orderList)
            ->paginate(10);
        $get_products_to_json = modProducts::whereHas('productAssignedCategory', function ($query) use ($request) {
            $query->where('categoryName', 'like', "%{$request->search}%")
                ->where('isActive',1);
        })
            ->orwhere('productName','like',"%{$request->search}%")
            ->orderBy($orderColumn, $orderList)
            ->get()
            ->toArray();

        // Second way to query the products
        $get_products_second_way = modProducts::join('categories','products.productCategoryId','=','categories.id')
            ->where('products.productName','like',"%{$request->search}%")
            ->orwhere('categories.categoryName','like',"%{$request->search}%")
            ->where('categories.isActive',1)
            ->get()
            ->toArray();
        if(!$get_products){
            return response()->json('No content', 204);
        }
        else{
            $get_products_json = json_encode($get_products_to_json);
            return view('result',compact('get_products','get_products_json'));
        }
    }
}
