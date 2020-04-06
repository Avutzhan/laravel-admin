<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Cviebrock\EloquentSluggable\Sluggable;
use StarterKit\Core\Traits\HasMedia;

class Article extends Model
{
    use Sluggable;
    use HasTranslations;


    public $translatable = [
        'title',
        'description',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $table = 'articles';

    protected $fillable = [
        'title',
        'description',
        'position',
        'site_display',
        'slug'
    ];
}
