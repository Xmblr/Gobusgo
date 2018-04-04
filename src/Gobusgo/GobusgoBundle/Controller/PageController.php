<?php

namespace Gobusgo\GobusgoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        $seoDescription = 'Index';
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle('GObusGO')
            ->addMeta('name', 'description', $seoDescription)
            ->addMeta('property', 'og:description', $seoDescription)
        ;

        return $this->render('@GobusgoGobusgo/Page/index.html.twig');
    }

    public function catalogAction()
    {
        $seoDescription = 'catalog';
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle('GObusGO')
            ->addMeta('name', 'description', $seoDescription)
            ->addMeta('property', 'og:description', $seoDescription)
        ;

        return $this->render('@GobusgoGobusgo/Page/catalog.html.twig');
    }

    public function autoparkAction()
    {
        $seoDescription = 'autopark';
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle('GObusGO')
            ->addMeta('name', 'description', $seoDescription)
            ->addMeta('property', 'og:description', $seoDescription)
        ;

        return $this->render('@GobusgoGobusgo/Page/autopark.html.twig');
    }

    public function aboutAction()
    {
        $seoDescription = 'about';
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle('GObusGO')
            ->addMeta('name', 'description', $seoDescription)
            ->addMeta('property', 'og:description', $seoDescription)
        ;

        return $this->render('@GobusgoGobusgo/Page/about.html.twig');
    }

    public function feedbackAction()
    {
        $seoDescription = 'feedback';
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle('GObusGO')
            ->addMeta('name', 'description', $seoDescription)
            ->addMeta('property', 'og:description', $seoDescription)
        ;

        return $this->render('@GobusgoGobusgo/Page/feedback.html.twig');
    }

    public function deliveryRBAction()
    {
        $seoDescription = 'deliveryRB';
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle('GObusGO')
            ->addMeta('name', 'description', $seoDescription)
            ->addMeta('property', 'og:description', $seoDescription)
        ;

        return $this->render('@GobusgoGobusgo/Page/deliveryRB.html.twig');
    }

    public function deliveryMinskAction()
    {
        $seoDescription = 'deliveryMinsk';
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle('GObusGO')
            ->addMeta('name', 'description', $seoDescription)
            ->addMeta('property', 'og:description', $seoDescription)
        ;

        return $this->render('@GobusgoGobusgo/Page/deliveryMinsk.html.twig');
    }

    public function deliveryMinskMoscowAction()
    {
        $seoDescription = 'deliveryMinskMoscow';
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle('GObusGO')
            ->addMeta('name', 'description', $seoDescription)
            ->addMeta('property', 'og:description', $seoDescription)
        ;

        return $this->render('@GobusgoGobusgo/Page/deliveryMinskMoscow.html.twig');
    }

    public function deliveryMoscowMinskAction()
    {
        $seoDescription = 'deliveryMoscowMinsk';
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle('GObusGO')
            ->addMeta('name', 'description', $seoDescription)
            ->addMeta('property', 'og:description', $seoDescription)
        ;

        return $this->render('@GobusgoGobusgo/Page/deliveryMoscowMinsk.html.twig');
    }
}
