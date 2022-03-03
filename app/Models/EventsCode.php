<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventsCode extends Model
{
    use HasFactory;

    public function code()
    {
        return $this->belongsTo(Code::class);
    }
}
