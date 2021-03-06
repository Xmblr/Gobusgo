<?php
// src/AppBundle/Entity/User.php

namespace Gobusgo\GobusgoBundle\Entity;

use FOS\UserBundle\Model\User as BaseGroup;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="Group")
 */
class Group extends BaseGroup
{
    /**
     *
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
