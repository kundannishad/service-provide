<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasicSettings extends Model
{
    protected $filable =['about_title','about_image','about_description','term_and_condition','privacy_policy'];
}
