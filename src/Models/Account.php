<?php
namespace App\Models;

class Account
{
    protected $owner;

    /**
     * Account constructor.
     * @param $owner
     */
    public function __construct($owner)
    {
        $this->owner = $owner;
    }

    public function getOwner()
    {
        return $this->owner;
    }

}
