<?php
// src/Blogger/BlogBundle/Controller/CommentController.php

namespace Gobusgo\GobusgoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Gobusgo\GobusgoBundle\Entity\Comment;
use Gobusgo\GobusgoBundle\Form\CommentType;
use Symfony\Component\HttpFoundation\Request;

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

    public function createAction(Request $request, $blog_id)
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
            $em = $this->getDoctrine()
                ->getManager();
            $em->persist($comment);
            $em->flush();

            $this->addFlash('info', 'Ваш коментарий отправлен, он появится после модерации.');

            return $this->redirect($this->generateUrl('gobusgo_gobusgo_blog_show', array(
                    'id' => $comment->getBlog()->getId())) .
                '#comment-' . $comment->getId()
            );
        }

        return $this->render('GobusgoGobusgoBundle:Blog:create.html.twig', array(
            'comment' => $comment,
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
