<?php
// src/Blogger/BlogBundle/Controller/CommentController.php

namespace Gobusgo\GobusgoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Gobusgo\GobusgoBundle\Entity\Comment;
use Gobusgo\GobusgoBundle\Form\CommentType;
use Symfony\Component\HttpFoundation\Request;
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

/**
 * Comment controller.
 */
class CommentController extends Controller
{
    public function newAction($blog_id)
    {
        $blog = $this->getBlog($blog_id);

        $comment = new Comment();
        $comment->setBlog($blog);
        $form   = $this->createForm(CommentType::class, $comment);

        return $this->render('GobusgoGobusgoBundle:Blog:form.html.twig', array(
            'comment' => $comment,
            'form'   => $form->createView()
        ));
    }

    public function createAction(Request $request, $blog_id, $categoryUrl)
    {
        $blog = $this->getBlog($blog_id);

        $comment  = new Comment();
        $comment
            ->setBlog($blog)
            ->setApproved(false);
        ;

        $form    = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isValid()) {
            try
            {
                $mailer = new Swift_Mailer(Swift_SmtpTransport::newInstance(
                    $this->container->getParameter('mailer_host'),
                    $this->container->getParameter('mailer_port'),
                    $this->container->getParameter('mailer_encryption')
                )
                    ->setUsername($this->container->getParameter('mailer_user'))
                    ->setPassword($this->container->getParameter('mailer_password')));
                $message = (new \Swift_Message('Новый комментарий в блоге'))
                    ->setFrom('seo-newline@mail.ru')
                    ->setTo('seo-newline@mail.ru')
                    ->setBody('Новый комментарий в блоге')
                ;

                $mailer->send($message);

                $this->addFlash('info', 'Ваш коментарий отправлен, он появится после модерации.');
            }
            catch (\Exception $ex)
            {
                $this->addFlash('info', $ex);
            }

            $em = $this->getDoctrine()
                ->getManager();
            $em->persist($comment);
            $em->flush();

            return $this->redirect($this->generateUrl('gobusgo_gobusgo_blog_show', array(
                    'id'    => $comment->getBlog()->getId(),
                    'categoryUrl' => $categoryUrl,
                    'url'  => $comment->getBlog()->getUrl())) .
                    '#comment-' . $comment->getId()
            );
        }

        return $this->render('GobusgoGobusgoBundle:Blog:create.html.twig', array(
            'comment' => $comment,
            'categoryUrl' => $categoryUrl,
            'form'    => $form->createView()
        ));
    }

    protected function getBlog($blog_id)
    {
        $em = $this->getDoctrine()
            ->getManager();

        $blog = $em->getRepository('GobusgoGobusgoBundle:Blog')->find($blog_id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $blog;
    }

}
