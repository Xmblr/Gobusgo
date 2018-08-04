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
        $seoH1 = $this->SetSeo('homepage');

        $callform = $this->Call($request);

        $blogs = $this->GetLatestNews();


        return $this->render('@GobusgoGobusgo/Page/index.html.twig', array(
            'callform' =>$callform->createView(),
            'seoH1' => $seoH1,
            'blogs' => $blogs
        ));
    }

    public function confirmAction(Request $request)
    {
        $seoH1 = $this->SetSeo('confirm');

        $callform = $this->Call($request);

        return $this->render('@GobusgoGobusgo/Page/confirm.html.twig', array(
            'callform' =>$callform->createView(),
            'seoH1' => $seoH1
        ));
    }

    public function catalogAction()
    {
        $seoH1 = $this->SetSeo('catalog');

        return $this->render('@GobusgoGobusgo/Page/catalog.html.twig', array(
            'seoH1' => $seoH1,
        ));
    }

    public function autoparkAction(Request $request)
    {
        $seoH1 = $this->SetSeo('autopark');

        $callform = $this->Call($request);

        return $this->render('@GobusgoGobusgo/Page/autopark.html.twig', array(
            'callform' =>$callform->createView(),
            'seoH1' => $seoH1,
        ));
    }

    public function aboutAction(Request $request)
    {
        $seoH1 = $this->SetSeo('about');

        $callform = $this->Call($request);

        $blogs = $this->GetLatestNews();


        return $this->render('@GobusgoGobusgo/Page/about.html.twig', array(
            'callform' =>$callform->createView(),
            'seoH1' => $seoH1,
            'blogs'=>$blogs
        ));
    }

    public function feedbackAction(Request $request)
    {
        $seoH1 = $this->SetSeo('feedback');

        $callform = $this->Call($request);

        return $this->render('@GobusgoGobusgo/Page/feedback.html.twig', array(
            'callform' =>$callform->createView(),
            'seoH1' => $seoH1,
        ));
    }

    public function deliveryRBAction(Request $request)
    {
        $em = $this->getDoctrine()
            ->getManager();

        $seoH1 = $this->SetSeo('deliveryRB');

        $legalCallform = $this->createForm('Gobusgo\GobusgoBundle\Form\LegalCallType',null,array(
            'action' => $this->generateUrl('gobusgo_gobusgo_deliveryRB'),
            'method' => 'POST'
        ));
        $legalCallform->get('cities')->setData('test');
        if ($request->isMethod('POST')) {
            $legalCallform->handleRequest($request);

            if($legalCallform->isValid()){
                // Send mail
                $data = $legalCallform->getData();
                $this->Mailer($data);
                $this->addFlash(
                    'info',
                    $data
                );
                return $this->redirectToRoute('gobusgo_gobusgo_confirm');

            }
        }

        $cities = $em->getRepository('GobusgoGobusgoBundle:City')->getCity();


        $individualCallform = $this->createForm('Gobusgo\GobusgoBundle\Form\IndividualCallType',null,array(
            'action' => $this->generateUrl('gobusgo_gobusgo_deliveryRB'),
            'method' => 'POST'
        ));
        if ($request->isMethod('POST')) {
            $individualCallform->handleRequest($request);

            if($individualCallform->isValid()){
                // Send mail
                $data = $individualCallform->getData();
                $this->Mailer($data);
                $this->addFlash(
                    'info',
                    $data
                );
                return $this->redirectToRoute('gobusgo_gobusgo_confirm');

            }
        }


        $callform = $this->Call($request);

        $em = $this->getDoctrine()
            ->getManager();

        $blogs = $this->GetLatestNews();


        return $this->render('@GobusgoGobusgo/Page/deliveryRB.html.twig', array(
            'callform' =>$callform->createView(),
            'individualCallform' =>$individualCallform->createView(),
            'legalCallform' =>$legalCallform->createView(),
            'cities'=>$cities,
            'blogs'=>$blogs,
            'seoH1' => $seoH1,
        ));
    }

    public function deliveryMinskAction(Request $request)
    {
        $em = $this->getDoctrine()
            ->getManager();

        $seoH1 = $this->SetSeo('deliveryMinsk');

        $callform = $this->Call($request);

        $blogs = $this->GetLatestNews();



        return $this->render('@GobusgoGobusgo/Page/deliveryMinsk.html.twig', array(
            'callform' =>$callform->createView(),
            'seoH1' => $seoH1,
            'blogs'=>$blogs
        ));
    }

    public function deliveryMoscowMinskAction(Request $request)
    {
        $em = $this->getDoctrine()
            ->getManager();

        $seoH1 = $this->SetSeo('deliveryMoscowMinsk');

        $legalCallform = $this->createForm('Gobusgo\GobusgoBundle\Form\LegalCallType',null,array(
            'action' => $this->generateUrl('gobusgo_gobusgo_deliveryMoscowMinsk'),
            'method' => 'POST'
        ));
        $legalCallform->get('height')->setData('Не задано');
        $legalCallform->get('lenght')->setData('Не задано');
        $legalCallform->get('width')->setData('Не задано');

        if ($request->isMethod('POST')) {
            $legalCallform->handleRequest($request);

            if($legalCallform->isValid()){
                // Send mail
                $data = $legalCallform->getData();
                $this->Mailer($data);
                $this->addFlash(
                    'info',
                    $data
                );
                return $this->redirectToRoute('gobusgo_gobusgo_confirm');

            }
        }

        $individualCallform = $this->createForm('Gobusgo\GobusgoBundle\Form\IndividualCallType',null,array(
            'action' => $this->generateUrl('gobusgo_gobusgo_deliveryMoscowMinsk'),
            'method' => 'POST'
        ));
        $individualCallform->get('height')->setData('Не задано');
        $individualCallform->get('lenght')->setData('Не задано');
        $individualCallform->get('width')->setData('Не задано');


        if ($request->isMethod('POST')) {
            $individualCallform->handleRequest($request);

            if($individualCallform->isValid()){
                // Send mail
                $data = $individualCallform->getData();
                $this->Mailer($data);
                $this->addFlash(
                    'info',
                    $data
                );
                return $this->redirectToRoute('gobusgo_gobusgo_confirm');

            }
        }

        $callform = $this->Call($request);

        $blogs = $this->GetLatestNews();


        return $this->render('@GobusgoGobusgo/Page/deliveryMoscowMinsk.html.twig', array(
            'callform' =>$callform->createView(),
            'individualCallform' =>$individualCallform->createView(),
            'legalCallform' =>$legalCallform->createView(),
            'blogs'=>$blogs,
            'seoH1' => $seoH1,
        ));
    }

    public function contactsAction(Request $request)
    {
        $seoH1 = $this->SetSeo('contacts');

        $callform = $this->Call($request);

        return $this->render('@GobusgoGobusgo/Page/contacts.html.twig', array(
            'callform' =>$callform->createView(),
            'seoH1' => $seoH1,
        ));
    }

    public function blogAction(Request $request)
    {

        $em = $this->getDoctrine()
            ->getManager();

        $seoH1 = $this->SetSeo('blog');

        $blogs = $em->getRepository('GobusgoGobusgoBundle:Blog')
            ->getLatestBlogs();


        return $this->render('GobusgoGobusgoBundle:Blog:index.html.twig', array(
            'blogs' => $blogs,
            'seoH1' => $seoH1,
        ));
    }

    public function blogShowAction($url)
    {
        $em = $this->getDoctrine()
            ->getManager();

        $seoH1 = $this->SetSeo('blogShow');

        $blog = $em->getRepository('GobusgoGobusgoBundle:Blog')->findOneBy(array('url'=>$url));

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        $comments = $em->getRepository('GobusgoGobusgoBundle:Comment')
            ->getCommentsForBlog($blog->getId());

        return $this->render('GobusgoGobusgoBundle:Blog:show.html.twig', array(
            'blog'      => $blog,
            'seoH1' => $seoH1,
            'comments'  => $comments
        ));
    }

    public function sidebarAction()
    {
        $em = $this->getDoctrine()
            ->getManager();

        $tags = $em->getRepository('GobusgoGobusgoBundle:Blog')
            ->getTags();

        $tagWeights = $em->getRepository('GobusgoGobusgoBundle:Blog')
            ->getTagWeights($tags);

        $commentLimit   = 10;
        $latestComments = $em->getRepository('GobusgoGobusgoBundle:Comment')
            ->getLatestComments($commentLimit);

        $category = $em->getRepository('GobusgoGobusgoBundle:Category')
            ->getCategory();

        return $this->render('GobusgoGobusgoBundle:Blog:sidebar.html.twig', array(
            'latestComments'    => $latestComments,
            'tags'              => $tagWeights,
            'category'=>$category
        ));
    }

    public function categoryAction($categoryUrl)
    {
        $em = $this->getDoctrine()
            ->getManager();

        $seoH1 = $this->SetSeo('category');

        $categoryId = $em->getRepository('GobusgoGobusgoBundle:Category')->findOneBy(array('url'=>$categoryUrl))->getId();

        $blogs = $em->getRepository('GobusgoGobusgoBundle:Blog')
            ->getLatestBlogs(null, $categoryId);


        return $this->render('GobusgoGobusgoBundle:Blog:index.html.twig', array(
            'blogs' => $blogs,
            'seoH1' => $seoH1,
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

//                $request->getSession()
//                    ->getFlashBag()
//                    ->add('success', 'Спасибо за оформление обратного званка. Наши специалисты свяжутся с вами в ближайшее время.');
                $this->addFlash(
                    'success',
                    'Спасибо за оформление обратного звонка. Наши специалисты свяжутся с вами в ближайшее время.'
                );
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

    public function SetSeo($url)
    {
        $em = $this->getDoctrine()
            ->getManager();

        $seo = $em->getRepository('GobusgoGobusgoBundle:Seo')->findOneBy(['url'=>$url]);

        $seoDescription = $seo->getDescription();
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle($seo->getTitle())
            ->addMeta('name', 'description', $seoDescription)
            ->addMeta('property', 'og:description', $seoDescription)
        ;

        return $seoH1 = $seo->getH1();
    }

    public function GetLatestNews()
    {
        $em = $this->getDoctrine()
            ->getManager();

        return $em->getRepository('GobusgoGobusgoBundle:Blog')
            ->getLatestBlogs(3);
    }

}

