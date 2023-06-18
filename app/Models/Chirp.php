<?php

namespace App\Models;
//Added Step 07 - SA
use App\Events\ChirpCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model
{
    use HasFactory;
    //For Mass Assigment Protection -- SA
    protected $fillable = [
        'message',
    ];
    //Added Step 07 - SA
    protected $dispatchesEvents = [

        'created' => ChirpCreated::class,

    ];

    //Showing Chips 2 - SA
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
