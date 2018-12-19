<?php

namespace Application\Sonata\MediaBundle\PHPCR;

use Sonata\MediaBundle\PHPCR\BaseGalleryHasMedia as BaseGalleryHasMedia;

/**
 * This file has been generated by the SonataEasyExtendsBundle.
 *
 * @link https://sonata-project.org/easy-extends
 *
 * References:
 * @link http://docs.doctrine-project.org/projects/doctrine-phpcr-odm/en/latest/index.html
 */
class GalleryHasMedia extends BaseGalleryHasMedia
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