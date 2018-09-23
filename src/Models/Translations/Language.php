<?php

namespace LaravelCMS\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $hidden = ['id'];
    protected $fillable = ['name', 'slug'];
    protected $table = 'cms_languages';

    public function fragments ()
    {
        return $this->hasMany('LaravelCMS\Models\Translations\Fragment');
    }
}
