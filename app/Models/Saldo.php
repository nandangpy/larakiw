<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Ramsey\Uuid\Uuid;

class Saldo extends Model
{
    use HasUuids, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'uid_s';
    protected $table = 'saldo';
    protected $fillable = [
        'id',
        'total_saldo'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uid_s = Uuid::uuid4()->toString();
        });
    }
}
