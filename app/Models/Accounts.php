<?php 

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Authenticatable
 {
    protected $table = 'accounts';

    protected $primaryKey = 'id';
    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'cccdfront',
        'cccdback',
        'email',
        'role',
        'password',
    ];
}