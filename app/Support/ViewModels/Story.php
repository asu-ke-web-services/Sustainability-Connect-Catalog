<?php

namespace SCCatalog\Support\ViewModels;

use Carbon\Carbon;

/**
 * Class Story
 *
 * @package    App\Support\ViewModels
 * @subpackage App\Support\ViewModels\Story
 */
class Story
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $headline;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var integer
     */
    protected $commentCount;

    /**
     * @var string
     */
    protected $createdBy;

    /**
     * @var Carbon
     */
    protected $createdOn;

    /**
     * Constructor.
     *
     * @param int    $id
     * @param string $headline
     * @param string $url
     * @param int    $commentCount
     * @param string $createdBy
     * @param Carbon $createdOn
     */
    public function __construct($id, $headline, $url, $commentCount, $createdBy, Carbon $createdOn)
    {
        $this->id           = $id;
        $this->headline     = $headline;
        $this->url          = $url;
        $this->commentCount = $commentCount;
        $this->createdBy    = $createdBy;
        $this->createdOn    = $createdOn;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getHeadline()
    {
        return $this->headline;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return int
     */
    public function getCommentCount()
    {
        return $this->commentCount;
    }

    /**
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @return Carbon
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }
}
