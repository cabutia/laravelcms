<?php

namespace LaravelCMS\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class Fragment extends Model
{
    protected $hidden = ['id'];
    protected $fillable = ['key', 'value', 'language_id'];
    protected $table = 'cms_fragments';

    public function language ()
    {
        return $this->belongsTo('LaravelCMS\Models\Translations\Language')
    }
}
