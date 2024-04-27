<?php

namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\User;
use Validator;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

// use Illuminate\Validation\Validator as Validator;

class UsersController extends BaseController
{
    /**
     * Display a listing of the User resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        //Fetching all users
        try {
            
            $users = User::all();
            if (is_null($users)) {
                return $this->errorResponse('No user found, try again', 400, false);
            }
            return $this->sendResponse(UserResource::collection($users), 'Total of '. count($users). ' users retrieved successfully.', 200, true);
                
        }catch (\Exception $e){
            return $this->errorResponse($e->getMessage(), 200, true);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request): JsonResponse
    {

        $input = $request->all();

        $validator = Validator::make($input, [
            'surname' => 'required',
            'othername' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
            'gender' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $user = User::create($input);
        
        return $this->sendResponse(new UserResource($user), 'Uesr created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id): JsonResponse
    {
        
        try {
            
            $user = User::find($id);
            if (is_null($user)) {
                return $this->sendError('User with ID '. $id. ' not found');
            }
            return $this->sendResponse(new UserResource($user), 'User retrieved successfully.');
            // return $this->sendResponse($user, 200, true);
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 404, true);
        }
        
        
        
        // if (is_null($user)) {
            //     return $this->sendError('User not found.');
            // }
        }
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, User $user): JsonResponse
        {
            $input = $request->all();
            
            dd($input, $user);
            $validator = Validator::make($input, [
                'surname' => 'required',
                'othername' => 'required',
                'email' => 'required',
                'phone_no' => 'required',
                'gender' => 'required'
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            
            $user->surname = $input['surname'];
            $user->othername = $input['othername'];
            $user->email = $input['email'];
            $user->phone_no = $input['phone_no'];
            $user->gender = $input['gender'];
            $user->save();
            
        return $this->sendResponse(new UserResource($user), 'User updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user): JsonResponse
    {
        try {
            
            $user = $this->user();
            if (is_null($user)) {
                return $this->sendError('User not found');
            }
            $user->delete();
            return $this->sendResponse([], 'User deleted successfully.');
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 404);
        }
    }
}
