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
        'deskripsi_barang',
        'harga_barang',
        'stok_barang',
        'foto_barang',
        'slug',
    ];

    /**
     * Returns the user this transaksi belongs to
     *
     * @return  \App\Models\Barang
     */
    public function kategoribarang()
    {
        return $this->hasMany(Barang::class, 'uid_bk', 'uid_bk');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uid_b = Uuid::uuid4()->toString();
        });
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where('nama_barang', 'like', '%' . request('search') . '%')
                ->orWhere('deskripsi_barang', 'like', '%' . request('search') . '%'));
        
    }
}
