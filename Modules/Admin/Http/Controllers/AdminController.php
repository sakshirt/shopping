<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use \Modules\Admin\Entities\User;
use \Modules\Admin\Entities\Role;
use \Modules\Admin\Emails\SendForgotPasswordEmail;

class AdminController extends Controller
{
    protected $response;

    public function __construct()
    {
        $this->data = new \stdClass();
    }

    /**
     * Email Content: Returns a string of the email contents
     * $email: "to" email address; $type: email functionality type (eg. forgot password)
     */

    public function emails($email, $type)
    {
        $email = ['forgot' => ['body' => '<p>Hi '.User::getNameByEmail($email).',

                    We received a request to reset your Divine Impex password.
                   
                    You can directly change your password by clicking on the button below
                    <button href="password.reset">Reset Link</button>
                    
                    </p>   ',
            'from' => 'info@divineimpex.com',
            'subject' => 'Reset your password - Divine Impex',
            'name' => 'Ravindra Singh']];

        return $email[$type];
    }

    /************************** ERRORS *************************/

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


    /********************** REGISTER ****************************/

    public function register()
    {
        $this->data->title = 'Register';
        return view('admin::register')->with('data', $this->data);
    }

    /** store the user **/
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

        $userRole = $user->roles()->where('role_id', $role)->first();

        $user->roles()->sync([$role]);

        \Auth::login($user, true);
        $response['status'] = 'success';
        $response['messages'][] = 'User Stored Successfully';
        $response['data']['redirect_url'] = route('admin.dashboard');
        return response()->json($response);
    }

    /********************** LOGIN ****************************/

    public function login()
    {
        $this->data->title = 'Login';
        return view('admin::login')->with('data', $this->data);
    }

    /** validate the user login **/
    public function authenticate(Request $request)
    {
        $rules = [
            'email' => 'email|required',
            'password' => 'required'
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

        $user = User::where('email', $request->email)->first();
        $response = [];
        if (!$user || empty($user))
        {
            $response['status'] = 'failed';
            $response['errors'][] = 'Email not found';
            return response()->json($response);
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            \Auth::login($user, true);

            $response['status'] = 'success';
//            $response['data'] = $credentials;
            $response['data']['redirect_url'] = route('admin.dashboard');
            $response['messages'][] = 'User logged in successfully';
            return response()->json($response);
        }

        $response['status'] = 'failed';
        $response['errors'][] = 'Password is incorrect';
        return response()->json($response);
    }

    /************************* FORGOT PASSWORD ***************************/
    public function forgotPassword()
    {
        $this->data->title = 'Forgot Password';
        return view('admin::forgot-password')->with('data', $this->data);
    }

    public function sendForgotPasswordEmail(Request $request)
    {
//        \Mail::to($request->email)->send(new SendForgotPasswordEmail(
//            $this->emails($request->email, 'forgot')));

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
