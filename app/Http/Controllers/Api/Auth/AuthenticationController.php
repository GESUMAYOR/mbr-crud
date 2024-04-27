<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use \Validator;
use Illuminate\Http\JsonResponse;


class AuthenticationController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'surname' => 'required',
            'othername' => 'required',
            'email' => 'required|email',
            'phone_no' => 'required',
            'password' => 'required|min:6',
            'c_password' => 'required|same:password',
            'image_url' =>  'required|mimes:jpg,jpeg,png'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $input = $request->all();

        $userEmailExists = User::whereEmail($input['email'])->exists(); //Checking to see if the inputed email already exists in the database or has been used by another use
        $userPhoneExists = User::wherePhoneNo($input['phone_no'])->exists();

        if ($userEmailExists) {
            return $this->sendError('Duplicate Error.', 'This email ' . $input['email'] . ' already exists or has been used by a user in the database, check the email and try again');
            return back();
        } elseif($userPhoneExists){
            return $this->sendError('Duplicate Error.', 'This Phone No ' . $input['phone_no'] . ' already exists or has been used by a user in the database, check the phone No and try again');
            return back();
        } 
        
        else{    
            $input['password'] = bcrypt($input['password']);

            
            if (request()->hasFile('image')) {
                $userImg = $request->file('image');
                $imgName = time() . '.' . $userImg->getClientOriginalExtension();
                $destPath = public_path('/images/userimages/');
                $userImg->move($destPath, $imgName);
                
            }
            $user = User::create($input);
            // $user->image_url = $destPath . $imgName;

            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['surname'] =  $user->surname;
            $success['othername'] =  $user->othername;
            $success['email'] =  $user->email;
            $success['phone No'] =  $user->phone_no;


            return $this->sendResponse($success, 'User ' . $user->surname .' '. $user->othername .' registered successfully.');
        }
    }


    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request): JsonResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['surname'] =  $user->surname;
            return $this->sendResponse($success, 'User logged in successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }
}
