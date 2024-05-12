<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * Check the role of authenticated user.
     * @param $role_names
     * @return bool
     */
    // public static function hasRoles($role_names)
    // {
    //     if (Auth::check())
    //     {
    //         if (!is_array($role_names)) {
    //             $role_names = explode('|', $role_names);
    //         }

    //         // create array to store multiple roles to check
    //         $check_role = User::select('roles.name')
    //             ->join('roles', 'roles.id', '=', 'users.role_id')
    //             ->where('users.id', Auth::User()->id)
    //             ->where(function ($query) use ($role_names)
    //             {
    //                 $query->orWhereIn('roles.name', $role_names);
    //             })
    //             ->first();

    //         return $check_role;
    //     }
    //     return false;
    // }




    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'img_file',
        'Phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }





    public function getImage()
    {
        if(!empty($this->img_file) && file_exists('upload/blog/'.$this->img_file)) {
            return url('upload/blog/'.$this->img_file);
        }
        else
        {
            return " ";
        }
    }

}
