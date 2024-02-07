<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Ramsey\Uuid\Uuid;


class Berita extends Model
{
    use HasUuids, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'uid_b';
    protected $table = 'berita';
    protected $fillable = [
        'uid_bk',
        'title',
        'slug',
        'content',
        'status',
        'published_at',
    ];

    /**
     * Returns the user this transaksi belongs to
     *
     * @return  \App\Models\Merk
     */
    public function berita()
    {
        return $this->hasMany(Berita::class, 'uid_bk', 'uid_bk');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    
}
