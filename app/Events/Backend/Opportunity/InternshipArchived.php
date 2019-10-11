<?php

namespace SCCatalog\Events\Backend\Opportunity;

use Illuminate\Queue\SerializesModels;

class InternshipArchived
{
    use SerializesModels;

    public $internship;

    /**
     * Create a new event instance.
     *
     * @param $internship
     */
    public function __construct($internship)
    {
        $this->internship = $internship;
    }
}
