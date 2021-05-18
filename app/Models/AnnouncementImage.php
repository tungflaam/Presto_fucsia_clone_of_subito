<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementImage extends Model
{
    use HasFactory;
    protected $fillable = ['file', 'announcement_id'];

    public function announcement() {
        return $this->belongsTo(Announcement::class);
    }
}