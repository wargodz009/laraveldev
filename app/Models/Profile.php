<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['name','user_name','avatar','email','user_role'];

    public static $validationRules = [
      'name'    => 'required|string',
      'user_name'    => 'required|string|min:4|max:20',
      'avatar'    => 'required',
      'email'    => 'required|email',
      'user_role'    => 'required|in:admin,user'
    ];
}
