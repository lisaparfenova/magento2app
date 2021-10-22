<?php
namespace Astrio\Module7\Api\Data;

interface ListingInterface
{
    /**#@+
     * Constants
     * @var string
     */
    const LIST_ID = 'list_id';
    const TITLE = 'title';

    /**
     * @return int
     */
    public function getListId();

    /**
     * @param int $list_id
     * @return $this
     */
    public function setListId($list_id);

   
    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title);

}