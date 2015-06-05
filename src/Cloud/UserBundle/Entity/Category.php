<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 28/05/2015
 * Time: 19:10
 */

namespace Cloud\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

class Category
{
    /**
     * @ORM\ManyToMany(targetEntity="Item", mappedBy="categories", cascade={"persist"})
     */
    private $items;

    /**
     * Add items
     *
     * @param Cloud\UserBundle\Entity\Item $items
     */
    public function addItems(\Cloud\UserBundle\Entity\Item $items)
    {
        $this->items[] = $items;
    }

    /**
     * Get items
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getItems()
    {
        return $this->items;
    }
}