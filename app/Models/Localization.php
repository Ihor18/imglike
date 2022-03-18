<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localization extends Model
{
    protected $table = 'localization';
    protected $guarded = [];

    static function getLangTitle($code)
    {
        switch ($code){
            case 'en':
                return 'English';
            case 'ru':
                return 'Русский';
            case 'ua':
                return 'Українська';
            case 'de':
                return 'Deutsch';
            case 'fr':
                return 'Le francais';
            case 'it':
                return 'Italiano';
            case 'es':
                return 'Español';
            case 'pt':
                return 'Português';
            case 'tr':
                return 'Türk';
            case 'hi':
                return 'हिन्दी';
            case 'ko':
                return '한국어';
            case 'id':
                return 'Bahasa Indonesia';
        }
        return $code;
    }
}
