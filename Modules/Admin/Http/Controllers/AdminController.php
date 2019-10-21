<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use \Modules\Admin\Entities\User;
use \Modules\Admin\Entities\Role;

class AdminController extends Controller
{
    protected $response;

    public function __construct()
    {
        $this->data = new \stdClass();
    }
    /**
     * Register the user
     * @return Response
     */

    //************* Associative array to single *******//
    public function getErrors($errors)  {
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

    //************* Register ******************//
    public function register()
    {
        $this->data->title = 'Register';
        return view('admin::register')->with('data', $this->data);
    }

    /**
     * dashboard
     *
     * @return void
     */
    public function dashboard()
    {
        print_r("dashboard");die;
    }

    /**
     * userStore
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function userStore(Request $request)
    {
        $rules = [
            'email' => 'email|required',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|confirmed'
        ];
        $msgs = [
            'email.email' => 'Email should be valid email.',
        ];
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['status'] = 'failed';
            $response['errors'] = $this->getErrors($validator->errors()->toArray());

            return response()->json($response);
        }

        $registerResponse = User::store($request);
        if (!$registerResponse || empty($registerResponse)) {
            $response['status'] = 'failed';
            $response['errors'][] = 'Something went wrong';
            return response()->json($registerResponse);
        }
        if ($registerResponse['status'] === 'failed') {
            return response()->json($registerResponse);
        }

        $user = $registerResponse['data'];

        $role = Role::getRoleIdUsingSlug('admin');

        $userRole = (new \Modules\Admin\Entities\User)->roles()->where('role_id', $role)->first();

        $user->roles()->sync([$role]);

        \Auth::login($user, true);
        $response['status'] = 'success';
        $response['messages'][] = 'User Stored Successfully';
        $response['data']['redirect_url'] = route('admin.dashboard');
        return response()->json($response);
    }


    /**
     * Register the user
     * @return Response
     */
    public function login()
    {
        $this->data->title = 'Login';
        return view('admin::login')->with('data', $this->data);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::index');
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
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        return view('admin::store');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
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
        $response['status'] = 'success';
        $response['data'] = 'data';
        $response['messages'][] = 'Success';
        $response['errors'][] = 'failed';
        return response()->json($response);
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
}
