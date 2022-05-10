<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PcoProcess extends Model
{
    protected $table = 'pco_process';

    public function tasks(): HasMany
    {
        return $this->hasMany(PcoTask::class, 'pco_process_id');
    }

    public function ctlProcess(): BelongsTo
    {
        return $this->belongsTo(CtlProcess::class, 'ctl_process_id');
    }

    public function pcoProcess(): HasMany
    {
        return $this->HasMany(PcoProcess::class, 'pco_process_id');
    }
}
