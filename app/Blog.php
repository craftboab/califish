<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Blog extends Model
{
  use Notifiable;

  protected $fillable = [
    'title','caption','blog_image',
  ];
}
