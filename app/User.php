<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'facebook_id',  'name', 'email', 'password', 'access_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    /**
     * Save a new user based on the attributes
     * @param  stdObject $attributes 
     * @return $this             
     */
    public static function saveFbUser($attributes)
    {
        $instance = (new static)->firstOrNew([
            'facebook_id' => $attributes->id
        ])->build($attributes); 
        $instance->save(); 
        return $instance; 
    }



    /**
     * Fill up the properties based on the class
     * @param  stdObject $attributes 
     * @return $this             
     */
    public function build($attributes)
    {
        return $this->fill([
            'name' => $attributes->name,  
            'email' => $attributes->email, 
            'access_token' => $attributes->token, 
        ]); 
    }



    /**
     * Helper method to log the user in 
     * @return $this 
     */
    public function login()
    {
        auth()->login($this); 

        return $this; 
    }


}
