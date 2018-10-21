<?php
namespace App\Models;

class Repository
{
    /**
     * @param string $name
     */
    protected $name ;
    /**
     * @param array $milestones
     */
    protected $milestones = [];

    /**
     * Repository constructor.
     * @param string $name
     * @param array $milestones
     */
    public function __construct($name, array $milestones = [])
    {
        $this->name = $name;
        $this->milestones = $milestones;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getMilestones()
    {
        return $this->milestones;
    }

    /**
     * @param array $milestones
     */
    public function setMilestones($milestones)
    {
        $this->milestones = $milestones;
    }

    /**
     * @param array $milestone
     */
    public function addMilestone($milestone)
    {
        $this->milestones = array_merge($this->milestones, $milestone);
    }

}
