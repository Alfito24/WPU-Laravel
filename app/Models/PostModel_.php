<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel
{
   private static $blog_posts = [
        [ "title" => "Halaman Sekolahku",
            "slug" => "judul-post-pertama",
         "author" => "Alfito",
         "body" => " Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim, rem, tempora eum nobis voluptatum tenetur incidunt nisi quaerat impedit harum odit necessitatibus. Nisi facere reprehenderit quo numquam repellendus consequatur ipsum!  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim, rem, tempora eum nobis voluptatum tenetur incidunt nisi quaerat impedit harum odit necessitatibus. Nisi facere reprehenderit quo numquam repellendus consequatur ipsum!"
         ],
         [
        "title" => "Halaman Kampusku",
         "slug" => "judul-post-kedua",
         "author" => "Khansa",
         "body" => " Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim, rem, tempora eum nobis voluptatum tenetur incidunt nisi quaerat impedit harum odit necessitatibus. Nisi facere reprehenderit quo numquam repellendus consequatur ipsum!  Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim, rem, tempora eum nobis voluptatum tenetur incidunt nisi quaerat impedit harum odit necessitatibus. Nisi facere reprehenderit quo numquam repellendus consequatur ipsum! Lorem ipsum dolor sit, amet consectetur adipisicing elitLorem ipsum dolor sit, amet consectetur adipisicing elitLorem ipsum dolor sit, amet consectetur adipisicing elitLorem ipsum dolor sit, amet consectetur adipisicing elit"]
     ];
     public static function all(){
        return collect(self::$blog_posts);
     }
     public static function find($slug){
        $blog_posts = static::all();
    //       $post = [];
    //  foreach($blog_posts as $blog)
    //     if($blog["slug"] === $slug){
    //         $post = $blog;
    //     }
        return $blog_posts->firstWhere('slug', $slug);
     }

}
