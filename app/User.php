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
        'name', 'email', 'password', 'role_id', 'is_active', 'photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function placeholder(){
        return '/images/placeholder.png';
    }


    public function isAdmin(){

        if($this->role->name = "administrator" && $this->is_active == 1){
            return true;
        }

        return false;

    }

    /**
     * Accessors
     *
     */
    public function getNameAttribute($value){
        return ucfirst($value);
    }

    public function getGravatarAttribute(){
        $hash = md5(strtolower(trim($this->attributes['email'])));

        return "http://www.gravatar.com/avatar/$hash"."?d=mm";
    }



}
