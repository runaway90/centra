<?php
namespace App\Models;

class Repository
{
    /**
     * @param string $name
     */
    protected $name;

    /**
     * @param array $issues
     */
    public $issues = [];

    /**
     * Repository constructor.
     * @param string $name
     * @param array $issues
     */
    public function __construct($name, array $issues = [])
    {
        $this->name = $name;
        $this->issues = $issues;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getIssues(): array
    {
        return $this->issues;
    }

    /**
     * @param array $issues
     */
    public function setIssues($issues)
    {
        $this->issues = $issues;
    }

    /**
     * @param object $issue
     */
    public function addIssue($issue)
    {
        $this->issues = array_merge($this->issues, [$issue]);
    }

}
