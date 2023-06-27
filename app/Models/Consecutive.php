<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consecutive extends Model
{
    use HasFactory;

    public function scopeFilter($query, $filters)
    {
        $query->when($filters['search'] ?? null,  function ($query, $search) {
            $query->where('id', 'LIKE', '%' . $search . '%')
                ->orwhere('consecutivo', 'LIKE', '%' . $search . '%')
                ->orwhere('name', 'LIKE', '%' . $search . '%')
                
                ->orwhereHas('monitor', function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' .  $search .  '%');
                })
                ->orWhereHas('cultural_rights', function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%');
                })
                ->orWhereHas('nac', function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%');
                })
                ->orWhereHas('expertise', function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%');
                });
        });
    }

    protected $fillable = [
        'consecutivo',
        'name',
        'monitor_id',
        'cultural_right_id',
        'nac_id',
        'activity_date',
        'start_time',
        'final_hour',
        'expertise_id',
    ];

    public function monitor()
    {
        return $this->belongsTo(User::class, 'monitor_id');
    }

    public function cultural_rights()
    {
        return $this->belongsTo(Cultural_rights::class, 'cultural_right_id');
    }
    public function nac()
    {
        return $this->belongsTo(Nacs::class, 'nac_id');
    }
    public function expertise()
    {
        return $this->belongsTo(Expertises::class, 'expertise_id');
    }
}
