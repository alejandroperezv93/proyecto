<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 28/05/2015
 * Time: 19:13
 */

namespace Cloud\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

class Item
{
    /**
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="items", cascade={"persist"})
     * @ORM\JoinTable(name="item_category",
     * joinColumns={@ORM\JoinColumn(name="item_id", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")}
     * )
     */
    private $categories;

    /**
     * Add categories
     *
     * @param Cloud\UserBundle\Entity\Category $categories
     */
    public function addCategories(\Cloud\UserBundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;
    }

    /**
     * Get categories
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }
}