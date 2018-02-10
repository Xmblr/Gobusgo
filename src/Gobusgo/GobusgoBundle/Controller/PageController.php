<?php

namespace Gobusgo\GobusgoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        $seoDescription = 'Description';
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle('GObusGO')
            ->addMeta('name', 'description', $seoDescription)
            ->addMeta('property', 'og:description', $seoDescription)
        ;

        return $this->render('@GobusgoGobusgo/Page/index.html.twig');
    }
}
