<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class EventDate extends Model
{	

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'site.eventDate';

    protected $guarded = ['id'];

    protected $dates = ['date'];

    public $timestamps = false;

    public function event(){
        return $this->belongsTo(Event::class, 'event_id');
    }

}

