<?php
namespace App\Controllers\Kanban;

use App\Controllers\Kanban\Interfaces\CreateTable;
use App\Models\Repository;

class TableController implements CreateTable
{

    public function create(Repository $repositories)
    {
        $nameRepository = $repositories->getName();

        $arrayDataForView = [];
        foreach ($repositories as $repository) {

            $newArrayDataForView = [];
            $percent = 0;
            foreach ($repository as $milestoneId => $issue) {

                if($issue->milestone->id !== null){

                        $openIssue = $issue->milestone->open_issues;
                        $closeIssue = $issue->milestone->closed_issues;
                        if($openIssue == 0 && $closeIssue == 0){
                            $process = 'queued';
                        }elseif ($openIssue == 0 && $closeIssue > 0){
                            $process = 'completed';
                        }else{
                            $process = 'active';
                            $percent = 100*$closeIssue($openIssue + $closeIssue);
                        }
                    $newArrayDataForView[$issue->milestone->id] = [
                        'milestone_number' => $issue->milestone->number,
                        'milestone_id' => $issue->milestone->id,
                        'milestone_title' => $issue->milestone->title,
                        'milestone_state' => $issue->milestone->state,
                        'milestone_open_issues' => $openIssue,
                        'milestone_closed_issues' => $closeIssue,
                        'milestone_url' => $issue->milestone->html_url,
                        'milestone_process' => $process,
                        'milestone_percent' =>$percent
                    ];
                }
            }

                $arrayDataForView = array_merge($arrayDataForView, $newArrayDataForView);

        }

        $loader = new \Twig_Loader_Filesystem('../templates/views');
        $twig = new \Twig_Environment($loader);

        echo $twig->render('table.html.twig', array('milestones' => $arrayDataForView, 'repository' =>$nameRepository));

    }

}
