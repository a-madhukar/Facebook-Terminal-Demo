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




    public static function saveFbUser($attributes)
    {
        $instance = (new static)->firstOrNew([
            'facebook_id' => $attributes->id
        ])->build($attributes); 
        $instance->save(); 
        return $instance; 
    }



    public function build($attributes)
    {
        return $this->fill([
            'name' => $attributes->name,  
            'email' => $attributes->email, 
            'access_token' => $attributes->token, 
        ]); 
    }



    public function login()
    {
        auth()->login($this); 

        return $this; 
    }


}
