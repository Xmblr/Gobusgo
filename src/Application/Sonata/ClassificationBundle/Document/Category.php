<?php

namespace Application\Sonata\ClassificationBundle\Document;

use Sonata\ClassificationBundle\Document\BaseCategory as BaseCategory;

/**
 * This file has been generated by the SonataEasyExtendsBundle.
 *
 * @link https://sonata-project.org/easy-extends
 *
 * References:
 * @link http://www.doctrine-project.org/docs/mongodb_odm/1.0/en/reference/working-with-objects.html
 */
class Category extends BaseCategory
{
    /**
     * @var int $id
     */
    protected $id;

    /**
     * Get id.
     *
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }
}