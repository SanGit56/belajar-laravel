<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Pertanyaan extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['kategori_id', 'user_id', 'tanya', 'jawab', 'gambar'];
    protected $with = ['user', 'kategori'];

    public function scopeSaring($query, array $saring)
    {
        $query->when($saring['cari'] ?? false, function($query, $cari) {
            return $query->where('tanya', 'like', '%' . $cari . '%')
                        ->orWhere('jawab', 'like', '%' . $cari . '%');
        });
        
        $query->when($saring['kategori'] ?? false, function($query, $kategori) {
            return $query->whereHas('kategori', function($query) use ($kategori) {
                $query->where('kategori_id', $kategori);
            });
        });

        $query->when($saring['pengguna'] ?? false, fn($query, $pengguna) =>
            $query->whereHas('user', fn($query) =>
                $query->where('username', $pengguna)
            )
        );
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        return [
            'jawab' => [
                'source' => 'tanya'
            ]
        ];
    }
}