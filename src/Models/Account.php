<?php
namespace App\Models;

class Account
{
    /**
     * @var string
     */
    protected $owner;

    /**
     * Account constructor.
     * @param string $owner
     */
    public function __construct($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return string
     */
    public function getOwner(): string
    {
        return $this->owner;
    }

}
