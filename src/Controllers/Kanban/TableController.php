<?php
namespace App\Controllers\Kanban;


class TableController
{


    public function board()
    {
        $ms = array();
        foreach ($this->repositories as $repository)
        {
            foreach ($this->github->milestones($repository) as $data)
            {
                $ms[$data['title']] = $data;
                $ms[$data['title']]['repository'] = $repository;
            }
        }
        ksort($ms);
        foreach ($ms as $name => $data)
        {
            $issues = $this->issues($data['repository'], $data['number']);
            $percent = self::_percent($data['closed_issues'], $data['open_issues']);
            if($percent)
            {
                $milestones[] = array(
                    'milestone' => $name,
                    'url' => $data['html_url'],
                    'progress' => $percent,
                    'queued' => $issues['queued'],
                    'active' => $issues['active'],
                    'completed' => $issues['completed']
                );
            }
        }
        return $milestones;
    }
}