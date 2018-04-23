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

    public function autoparkAction(Request $request)
    {
        $seoDescription = 'autopark';
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle('GObusGO')
            ->addMeta('name', 'description', $seoDescription)
            ->addMeta('property', 'og:description', $seoDescription)
        ;

        $callform = $this->Call($request);

        return $this->render('@GobusgoGobusgo/Page/autopark.html.twig', array(
            'callform' =>$callform->createView()
        ));
    }

    public function aboutAction(Request $request)
    {
        $seoDescription = 'about';
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle('GObusGO')
            ->addMeta('name', 'description', $seoDescription)
            ->addMeta('property', 'og:description', $seoDescription)
        ;
        $callform = $this->Call($request);

        return $this->render('@GobusgoGobusgo/Page/about.html.twig', array(
            'callform' =>$callform->createView()
        ));
    }

    public function feedbackAction(Request $request)
    {
        $seoDescription = 'feedback';
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle('GObusGO')
            ->addMeta('name', 'description', $seoDescription)
            ->addMeta('property', 'og:description', $seoDescription)
        ;

        $callform = $this->Call($request);

        return $this->render('@GobusgoGobusgo/Page/feedback.html.twig', array(
            'callform' =>$callform->createView()
        ));
    }

    public function deliveryRBAction(Request $request)
    {
        $seoDescription = 'deliveryRB';
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle('GObusGO')
            ->addMeta('name', 'description', $seoDescription)
            ->addMeta('property', 'og:description', $seoDescription)
        ;

        $callform = $this->Call($request);

        return $this->render('@GobusgoGobusgo/Page/deliveryRB.html.twig', array(
            'callform' =>$callform->createView()
        ));
    }

    public function deliveryMinskAction(Request $request)
    {
        $seoDescription = 'deliveryMinsk';
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle('GObusGO')
            ->addMeta('name', 'description', $seoDescription)
            ->addMeta('property', 'og:description', $seoDescription)
        ;

        $callform = $this->Call($request);

        return $this->render('@GobusgoGobusgo/Page/deliveryMinsk.html.twig', array(
            'callform' =>$callform->createView()
        ));
    }

    public function deliveryMoscowMinskAction(Request $request)
    {
        $legalCallform = $this->createForm('Gobusgo\GobusgoBundle\Form\ContactType',null,array(
            'action' => $this->generateUrl('gobusgo_gobusgo_deliveryMoscowMinsk'),
            'method' => 'POST'
        ));

        if ($request->isMethod('POST')) {
            $legalCallform->handleRequest($request);

            if($legalCallform->isValid()){
                // Send mail
                $data = $legalCallform->getData();
                $this->Mailer($data);
                $this->addFlash(
                    'notice',
                    $data
                );
                return $this->redirectToRoute('gobusgo_gobusgo_confirm');

            }
        }

        $callform = $this->Call($request);

        return $this->render('@GobusgoGobusgo/Page/deliveryMoscowMinsk.html.twig', array(
            'callform' =>$callform->createView(),
            'secondCallform' =>$callform->createView(),
            'legalCallform' =>$legalCallform->createView()
        ));
    }


    public function contactsAction(Request $request)
    {
        $seoDescription = 'deliveryMoscowMinsk';
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle('GObusGO')
            ->addMeta('name', 'description', $seoDescription)
            ->addMeta('property', 'og:description', $seoDescription)
        ;

        $callform = $this->Call($request);

        return $this->render('@GobusgoGobusgo/Page/contacts.html.twig', array(
            'callform' =>$callform->createView()
        ));
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

    public function Mailer($mail)
    {
        $mailer = $this->Transport();

        // Create a message
        $message = Swift_Message::newInstance('Форма обратной связи')
            ->setFrom(array('seo-newline@mail.ru' => 'Обратный звонок'))
            ->setTo($this->container->getParameter('gobusgo.emails.contact_email'))
            ->setBody($this->renderView('@GobusgoGobusgo/Page/callEmail.txt.twig', array('mail' => $mail)));
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
            ->setTo($this->container->getParameter('gobusgo.emails.contact_email'))
            ->setBody($this->renderView('@GobusgoGobusgo/Page/callEmail.txt.twig', array('call' => $call)));
        ;

        // Send the message
        $mailer->send($message);
    }

    public function Transport()
    {
        // Create the Transport
        $transport = Swift_SmtpTransport::newInstance(
            $this->container->getParameter('mailer_host'),
            $this->container->getParameter('mailer_port'),
            $this->container->getParameter('mailer_encryption')
        )
            ->setUsername($this->container->getParameter('mailer_user'))
            ->setPassword($this->container->getParameter('mailer_password'))
        ;

        // Create the Mailer using your created Transport
        return $mailer = Swift_Mailer::newInstance($transport);

    }
}

