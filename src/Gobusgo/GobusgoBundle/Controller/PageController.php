<?php

namespace Gobusgo\GobusgoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Gobusgo\GobusgoBundle\Entity\Enquiry;
use Gobusgo\GobusgoBundle\Form\EnquiryType;
use Gobusgo\GobusgoBundle\Form\CallType;
use Gobusgo\GobusgoBundle\Entity\Call;
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

class PageController extends Controller
{
    public function indexAction(Request $request)
    {
        $seoDescription = 'Index';
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle('GObusGO')
            ->addMeta('name', 'description', $seoDescription)
            ->addMeta('property', 'og:description', $seoDescription)
        ;

        $callform = $this->Call($request);

        return $this->render('@GobusgoGobusgo/Page/index.html.twig', array(
        'callform' =>$callform->createView()
        ));
    }

    public function confirmAction(Request $request)
    {
        $seoDescription = 'Index';
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle('GObusGO')
            ->addMeta('name', 'description', $seoDescription)
            ->addMeta('property', 'og:description', $seoDescription)
        ;

        $callform = $this->Call($request);

        return $this->render('@GobusgoGobusgo/Page/confirm.html.twig', array(
            'callform' =>$callform->createView()
        ));
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

    public function contactsAction()
    {
        $seoDescription = 'deliveryMoscowMinsk';
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle('GObusGO')
            ->addMeta('name', 'description', $seoDescription)
            ->addMeta('property', 'og:description', $seoDescription)
        ;

        return $this->render('@GobusgoGobusgo/Page/contacts.html.twig');
    }

    public function Call($request)
    {
        $call = new Call();

        $callform = $this->createForm(CallType::class, $call);

        if ($request->isMethod($request::METHOD_POST)) {

            $callform->handleRequest($request);
            if ($callform->isValid()) {

                $this->Caller($call);

                $request->getSession()
                    ->getFlashBag()
                    ->add('success', 'Ваше сообщение успешно отправлено.');
            }
        }

        return $callform;

    }

    public function Mailer($enquiry)
    {
        $mailer = $this->Transport();

        // Create a message
        $message = Swift_Message::newInstance('Форма обратной связи')
            ->setFrom(array('seo-newline@mail.ru' => 'Обратный звонок'))
            ->setTo($this->container->getParameter('blogger_blog.emails.contact_email'))
            ->setBody($this->renderView('BloggerBlogBundle:Page:contactEmail.txt.twig', array('enquiry' => $enquiry)));
        ;

        // Send the message
        $mailer->send($message);
    }

    public function Caller($call)
    {
        $mailer = $this->Transport();

        // Create a message
        $message = Swift_Message::newInstance('Форма обратного звонка')
            ->setFrom(array('seo-newline@mail.ru' => 'Обратный звонок'))
            ->setTo($this->container->getParameter('blogger_blog.emails.contact_email'))
            ->setBody($this->renderView('@GobusgoGobusgo/Page/callEmail.txt.twig', array('call' => $call)));
        ;

        // Send the message
        $mailer->send($message);
    }

    public function Transport()
    {
        // Create the Transport
        $transport = Swift_SmtpTransport::newInstance('smtp.mail.ru', 465, 'ssl')
            ->setUsername('seo-newline@mail.ru')
            ->setPassword('19086837dima')
        ;

        // Create the Mailer using your created Transport
        return $mailer = Swift_Mailer::newInstance($transport);

    }
}

