<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid; 

class Ticketing extends Model
{
    /**
     * @var string
     */
    protected $table = 'ticketing';

    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = [
        'id', 
        'ticket_number',
        'subject',
        'message',
        'status',
        'priority',
    ];
}