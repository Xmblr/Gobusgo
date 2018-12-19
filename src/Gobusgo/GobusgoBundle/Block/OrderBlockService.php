<?php

namespace Gobusgo\GobusgoBundle\Block;

use Sonata\BlockBundle\Block\BaseBlockService;
use Sonata\BlockBundle\Block\Service\BlockServiceInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\BlockBundle\Block\BlockContextInterface;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Validator\ErrorElement;
use Sonata\BlockBundle\Block\Service\AbstractBlockService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class OrderBlockService extends BaseBlockService implements BlockServiceInterface
{
    private $em;

    private $tokenStorage;

    /**
     * {@inheritdoc}
     */
    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {

        $settings = array_merge($this->getDefaultSettings(), $blockContext->getSettings());
        $userId = $this->tokenStorage->getToken()->getUser()->getId();
        $myentityrepository = $this->em->getRepository('GobusgoGobusgoBundle:Order');
        $myentity = $myentityrepository->findBy(array('userId' => $userId), array('id' => 'DESC'), 15);

        return $this->renderResponse('@GobusgoGobusgo/Block/block_order.html.twig', array(
            'block' => $blockContext->getBlock(),
            'settings' => $settings,
            'myentity' => $myentity,
        ), $response);
    }

    /**
     * {@inheritdoc}
     */
    public function validateBlock(ErrorElement $errorElement, BlockInterface $block)
    {
        // TODO: Implement validateBlock() method.
    }

    /**
     * {@inheritdoc}
     */
    public function buildEditForm(FormMapper $formMapper, BlockInterface $block)
    {
        $formMapper->add('settings', 'sonata_type_immutable_array', array(
            'keys' => array(
                array('content', 'textarea', array()),
            )
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Text (core)';
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultSettings()
    {
        return array(
            'content' => 'Insert your custom content here',
        );
    }

    public function __construct(TokenStorageInterface $tokenStorage, $name, $templating, EntityManager $entityManager)
    {
        $this->tokenStorage = $tokenStorage;
        $this->em           = $entityManager;

        parent::__construct($name, $templating);

    }

}