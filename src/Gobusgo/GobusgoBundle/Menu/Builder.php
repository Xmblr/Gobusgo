<?php

namespace Gobusgo\GobusgoBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Home', array('route' => 'gobusgo_gobusgo_homepage'));

        $menu->addChild('Contact', array('route' => 'gobusgo_gobusgo_about'));
        $menu['Contact']->addChild('+375291234567');
        $menu['Contact']->addChild('Edit profiles', array('route' => 'gobusgo_gobusgo_about'));


//        // access services from the container!
//        $em = $this->container->get('doctrine')->getManager();
//        // findMostRecent and Blog are just imaginary examples
//        $blog = $em->getRepository('AppBundle:Blog')->findMostRecent();
//
//        $menu->addChild('Latest Blog Post', array(
//            'route' => 'blog_show',
//            'routeParameters' => array('id' => $blog->getId())
//        ));

        // create another menu item

        // ... add more children

        return $menu;
    }

    public function secondMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Home', array('route' => 'gobusgo_gobusgo_homepage'));

        $menu->addChild('Contact', array('route' => 'gobusgo_gobusgo_about'));
        $menu['Contact']->addChild('+375291234567');
        $menu['Contact']->addChild('Edit profiles', array('route' => 'gobusgo_gobusgo_about'));


//        // access services from the container!
//        $em = $this->container->get('doctrine')->getManager();
//        // findMostRecent and Blog are just imaginary examples
//        $blog = $em->getRepository('AppBundle:Blog')->findMostRecent();
//
//        $menu->addChild('Latest Blog Post', array(
//            'route' => 'blog_show',
//            'routeParameters' => array('id' => $blog->getId())
//        ));

        // create another menu item

        // ... add more children

        return $menu;
    }
}