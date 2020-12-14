<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mail\BareMail;
use App\Notifications\PasswordResetNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Item extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','amount','quantity','case_volume','item_type','detail','item_image',
    ];
}
