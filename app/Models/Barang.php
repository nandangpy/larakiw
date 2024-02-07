<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Ramsey\Uuid\Uuid;

class Barang extends Model
{
    use HasUuids, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'uid_b';
    protected $table = 'barang';
    protected $fillable = [
        'uid_bk',
        'nama_barang',
        'deskripsi',
        'harga',
        'stok',
        'slug',
    ];

    /**
     * Returns the user this transaksi belongs to
     *
     * @return  \App\Models\Barang
     */
    public function Barang()
    {
        return $this->hasMany(Barang::class, 'uid_bk', 'uid_bk');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

}
