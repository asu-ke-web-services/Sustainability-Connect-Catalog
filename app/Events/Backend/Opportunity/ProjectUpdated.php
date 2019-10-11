<?php

namespace SCCatalog\Events\Backend\Opportunity;

use Illuminate\Queue\SerializesModels;

class ProjectUpdated
{
    use SerializesModels;

    public $project;

    /**
     * Create a new event instance.
     *
     * @param $project
     */
    public function __construct($project)
    {
        $this->project = $project;
    }
}
