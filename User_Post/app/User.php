<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    use Notifiable;
    protected $table = 'user';

    public $timestamps = true;

    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'password',
        'full_name',
        'gender',
        'post_number',
        'email',
        'featue_url',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permission',  'user_id', 'permission_id');
    }
}
