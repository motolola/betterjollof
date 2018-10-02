<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'messages';

    /**
     * Get the user that the message was sent to.
     */
    public function toUser()
    {
        return $this->belongsTo('App\Models\User', 'to_id');
    }
    /**
     * Get the user that the message was sent to.
     */
    public function fromUser()
    {
        return $this->belongsTo('App\Models\User', 'from_id');
    }
}
