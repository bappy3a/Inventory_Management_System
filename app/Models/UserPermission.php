<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    public function page()
    {
    	return $this->belongsTo(PermissionPage::class);
    }
}
