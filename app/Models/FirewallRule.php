<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FirewallRule extends Model
{
    protected $fillable = ['name', 'domain', 'chain', 'action', 'enabled', 'description'];
    protected function casts(): array {
        return ['enabled' => 'boolean'];
    }
    public function logs(): HasMany {
        return $this->hasMany(FirewallLog::class);
    }
}
