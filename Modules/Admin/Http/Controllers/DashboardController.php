<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use \Modules\Admin\Entities\Product;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
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
        return view('admin::dashboard')->with('data', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created product in storage.
     * @param Request $request
     * @return Response
     */
    public function saveProduct(Request $request)
    {
        $rules = [
            'name' => 'required',
            'price' => 'required|numeric',
            'image_url' => 'required',
        ];
        $messages = [
            'price.numeric' => 'Product price should be in digits',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['status'] = 'failed';
            $response['errors'] = $this->getErrors($validator->errors()->toArray());

            return response()->json($response);
        }
        Product::saveProduct($request->all());
        $response['status'] = 'success';
        $response['messages'][] = 'Product Stored Successfully';
        return response()->json($response);
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

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Upload File.
     * @param Request $request
     * @param int $id
     * @return Response
     */
	public function uploadFile(Request $request) {


		$file = $request->file( 'file' );
		$ext  = $file->getClientOriginalExtension();

		if ( Storage::putFileAs( '/public/' . $request->dir . '/' , $file, $request['name'] . '.' . $ext ) ) {
			$response['status'] = "success";
			$response['data'] = Storage::url('app/public/'.$request->dir.'/'.$request['name'] . '.' . $ext);
			return response()->json($response);
		}

		$response['status'] = "falied";
		$response['errors'][] = "Please try again";
		return response()->json($response);

	}
}
