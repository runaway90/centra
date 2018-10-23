<?php
namespace App\Controllers\Kanban\Interfaces;


use App\Models\Repository;

interface CreateTable
{
    public function create(Repository $repositories);

}