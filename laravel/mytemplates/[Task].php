<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // When models are soft deleted, they are not actually removed from your database. Instead, a deleted_at attribute is set on the model and inserted into the database. If a model has a non-null deleted_at value, the model has been soft deleted. To enable soft deletes for a model, use the Illuminate\Database\Eloquent\SoftDeletes trait on the model and add the deleted_at column to your $dates property:
    // use \Illuminate\Database\Eloquent\SoftDeletes;
    // add a proper column to the DB table
    // protected $dates = 'deleted_at';
    
    // protected $table         = 'my_custom_task_tablename';
    
    // protected $primaryKey    = 'my_custom_task_primary_key';
    
    // default is "true" -> incrementing the primary key is automatically handled by Eloquent (set it to false if the primary key is not incrementable (e.g. no numeric value))
    // protected $incrementing  = false;
    
    // default is "true" -> created_at and updated_at are managed automatically by Eloquent
    // protected $timestamps    = false;
    
    // if you want a custom date format for your timestamps (determines how timestamps are stored in the DB)
    // protected $dateFormat    = 'U';
    
    
    // const CREATED_AT         = 'my_custom_columnname_for_created_at';
    
    // const UPDATED_AT         = 'my_custom_columnname_for_updated_at';
    
    // by default, all Eloquent models will use the default database connection configured for your application
    // protected $connection    = 'my_custom_connectionname';
    
    // mass assignment is disabled by default -> to enable it specify mass assignable attributes (either use "fillable" or "guarded", not both)
    protected $fillable = [
        'title',
        'body'
    ];
    
    // mass assignment is disabled by default -> to enable it specify the attributes which are not mass assignable (either use "fillable" or "guarded", not both)
    // protected $guarded = ['price'];
    
    // event map for the model; Eloquent models fire several events, allowing you to hook into the following points in a model's lifecycle
    // protected $dispatchesEvents = [
    //     'retrieved' => UserRetrieved::class,
    //     'creating' => UserCreating::class,
    //     'created' => UserCreated::class,
    //     'updating' => UserUpdating::class,
    //     'updated' => UserUpdated::class,
    //     'saving' => UserSaving::class,
    //     'saved' => UserSaved::class,
    //     'deleting' => UserDeleting::class,
    //     'deleted' => UserDeleted::class,
    //     'restoring' => UserRestoring::class,
    //     'restored' => UserRestored::class,
    // ];
    
    // excluded from the model's JSON form
    // protected $hidden = ['password', 'remember_token',];
    
    // global scopes
    // protected static function boot()
    // {
    //     parent::boot();
    // 
    //     either with a class ...
    //     static::addGlobalScope(new \App\Scopes\AgeScope);
    //
    //    ... or with an anonymous function
    //    static::addGlobalScope('age', function (Builder $builder) {
    //        $builder->where('age', '>', 200);
    //    });
    // }
    // local scopes
    // public function scopePopular($query)
    // {
    //     return $query->where('votes', '>', 100);
    // }
    // local scopes with parameters
    // public function scopeOfType($query, $type)
    // {
    //     return $query->where('type', $type);
    // }
}
