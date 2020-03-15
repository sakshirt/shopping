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

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $this->data->title = 'Dashboard';

        return view('admin::frontend')->with('data', $this->data);
    }

    /**
     * get products from storage.
     * @param Request $request
     * @return Response
     */
    public function getProductList(Request $request)
    {
        $response['status'] = 'success';
        $response['data'] = Product::getList();
        return response()->json($response);
    }
}
