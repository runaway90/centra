<?php
namespace App\Controllers\Kanban;

use App\Controllers\Kanban\Interfaces\CreateTable;
use App\Models\Repository;

class TableController implements CreateTable
{
    public function create(Repository $repositories)
    {
        $arrayDataForView = [];
        foreach ($repositories as $repository){
            foreach ($repository as $issue) {

                $arrayDataForView[$issue->id] = ['id' => $issue->id];
            }

        }

//        var_dump($arrayDataForView);
        $m = new \Mustache_Engine(array(
            'loader' => new \Mustache_Loader_FilesystemLoader( '/templates/views'),
        ));
        echo $m->render('index', array('milestones' => $arrayDataForView));
    }



}
