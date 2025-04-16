<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    use HasFactory;

    protected $table = 'user_message';
    protected $fillable = ['customer_name', 'email', 'message', 'submit_date', 'read_status'];
}
