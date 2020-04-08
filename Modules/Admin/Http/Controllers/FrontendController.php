<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use \Modules\Admin\Entities\Product;
use Illuminate\Routing\Controller;

class FrontendController extends Controller
{
    protected $response;

    public function __construct()
    {
        $this->data = new \stdClass();
    }

    /************************ ERRORS ***************************/
    public function getErrors(array $errors) : array
    {
        $result = array();
        if (count($errors)>0) {
            foreach ($errors as $value) {
                if ($value && is_array($value)) {
                    $result = array_merge($value, $result);
                }else{
                    array_push($result, $value);
                }
            }
        }
        return $result;
    }

    /********************** DASHBOARD **************************/

    public function home()
    {
        $this->data->title = 'Dashboard';

        return view('admin::frontend.home')->with('data', $this->data);
    }

    /********************** SHOP **************************/

    public function shop()
    {
        $this->data->title = "Shop";

        return view('admin::frontend.shop')->with('data', $this->data);
    }

    /********************** SHOP **************************/

    public function aboutUs()
    {
        $this->data->title = "About Us";

        return view('admin::frontend.about-us')->with('data', $this->data);
    }

    /******* GET LIST ******/
    
    public function getProductList(Request $request)
    {
        $response['status'] = 'success';
        $response['data'] = Product::getList($request->search);
        return response()->json($response);
    }
}
