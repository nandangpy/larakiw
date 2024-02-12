<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Ramsey\Uuid\Uuid;

class Transaksi extends Model
{
    use HasUuids, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'uid_tr';
    protected $table = 'transaksi';
    protected $fillable = [
        'id',
        'uid_b',
        'jumlah_item',
        'total_harga',
        'alamat_pembeli',
        'status'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uid_tr = Uuid::uuid4()->toString();
        });
    }

    /**
     * Returns the user this transaksi belongs to
     *
     * @return  \App\Models\Barang
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'uid_b', 'uid_b');
        // return $this->hasMany(Barang::class, 'uid_bk', 'uid_bk');
    }

    /**
     * Returns the user this transaksi belongs to
     *
     * @return  \App\Models\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
        // return $this->hasMany(Barang::class, 'uid_bk', 'uid_bk');
    }


}
