<?php

namespace Djunehor;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{


    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

            'first_name', 'last_name', 'username', 'email', 'password',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getJWTIdentifier()
        {
            return $this->getKey();
        }
        
        public function getJWTCustomClaims()
        {
            return [];
        }


        public static function roles()
    {
        return ["admin", "customer", "artisan"];
    }

    //Roles at the moment "user","admin","superadmin"
    public function hasRole($role){

        if($this->role == "admin"){
            return true;
        } else if($this->role == "customer"){
            return true;
        } else if ($this->role == "artisan") {
            return true;
        }

        return false;
    }

    public static function roleErrorResponse(){

        $error["error"] = "Sorry, You do not have permission to access this";
        return response()->json(['error' => $error], 401);

    }

}
