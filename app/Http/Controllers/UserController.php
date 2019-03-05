<?php

	namespace Djunehor\Http\Controllers;

    use Djunehor\Activity;
    use Djunehor\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Facades\Validator;


    class UserController extends Controller
    {
	    protected $guardName = 'users';

	    public function authenticate()
	    {
		    $credentials = request(['email', 'password']);

		    if (! $token = $this->guard()->attempt($credentials)) {
			    Activity::create([
				    'user_id' => null,
				    'description' => "Attempt to login with ".request('email')." failed"
			    ]);
			    return response()->json(['message' => 'Invalid Credentials', 'type'=> 'invalid_credentials'], 401);
		    }

		    $user = $this->guard()->user();

		    Activity::create([
		    	'user_id' => $user->id,
			    'description' => "User $user->id logged in"
		    ]);

		    return response()->make()->withHeaders([
			    'Authorization' => "Bearer " . $token
		    ]);
	    }

        public function register(Request $request)
        {
                $validator = Validator::make($request->all(), [
                 'username' => 'required|string|max:255',
                 'email' => 'required|string|email|max:255|unique:users',
                 'password' => 'required|string|min:6',
                'first_name' => 'required|string',
                'last_name' => 'required|string',

            ]);

            if($validator->fails()){
                    return response()->json(['errors' => $validator->errors()], 401);
            }

            $user = User::create([
            	'username' => $request->username,
            	'email' => $request->email,
            	'password' => Hash::make($request->password),
            	'first_name' => $request->first_name,
            	'last_name' => $request->last_name,
            ]);

            //return response()->json(compact('user','token'),201);
	        Activity::create([
		        'user_id' => $user->id,
		        'description' => "User $user->id registered"
	        ]);
            return response()->json(['message' => 'User registered successfully', 'data' => $user]);
        }

	    public function guard() {
		    return auth()->guard( $this->guardName );
	    }

    }
