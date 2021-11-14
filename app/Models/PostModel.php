<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;
    // protected $fillable = ['title', 'excerpt', 'body'];
    protected $guarded = ['id'];
    protected $with = ['category', 'user'];
    public function scopeFilter($query, array $filters){
        // if(isset($filters['search']) ? $filters['search'] : false){
        //   return  $query -> where('title', 'like' , '%' . $filters['search'] . '%')
        //             -> orWhere('body', 'like', '%' .  $filters['search'] . '%');
        //  }
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                 $query->where('title', 'like', '%' . $search . '%')
                             ->orWhere('body', 'like', '%' . $search . '%');
             });
         });
         $query->when($filters['category'] ?? false, function($query, $category) {
           return $query->whereHas('category', function($query) use ($category){
                $query -> where('slug', $category);
           });
         });
         $query->when($filters['user'] ?? false, function($query, $user) {
            return $query->whereHas('category', function($query) use ($user){
                 $query -> where('username', $user);
            });
          });
        //  $query->when($filter['category'] ?? false, function($query, $search){

        //  });

    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
