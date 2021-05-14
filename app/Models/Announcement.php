<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Announcement extends Model
{
    use HasFactory;
    use Searchable;
    protected $fillable = ['title', 'body', 'category_id', 'user_id', 'price'];

    public function toSearchableArray()
    {
        $array = [
            'id'=>$this->id,
            'title'=> $this->title,
            'body'=>$this->body,
            'category'=>$this->category->name,
        ];

        

        return $array;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    static public function toBeRevised() 
    {
        return Announcement::where('is_accepted', null)->count();
    }

    static public function rejected() 
    {
        return Announcement::where('is_accepted', false)->count();
    }
}
