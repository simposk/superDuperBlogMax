<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
	protected $fillable = ["user_id", "title", "body"];

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function ownedBy(User $user) {
		return $this->user_id == $user->id;
	}
}
