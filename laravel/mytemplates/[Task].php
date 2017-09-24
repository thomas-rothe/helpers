<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class [Task] extends Model
{
    // protected $table         = '[custom_tablename]';
    // protected $primaryKey    = '[custom_columnname]';
    // protected $incrementing  = false;
    // protected $timestamps    = false;
    // protected $dateFormat    = 'U';
    // const CREATED_AT         = '[custom_columnname]';
    // const UPDATED_AT         = '[custom_columnname]';
    // protected $connection    = '[custom_connectionname]';
    protected $fillable = [
        'title',
        'body'
    ];
    // protected $guarded = ['price'];
}
