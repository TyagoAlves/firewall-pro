<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FirewallLog extends Model
{
    use HasFactory;
    protected $fillable = ['rule_id', 'source_ip', 'destination', 'action', 'protocol'];
    public function rule(): BelongsTo {
        return $this->belongsTo(FirewallRule::class);
    }
}
