<?php

namespace Gobusgo\GobusgoBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CRUDController extends Controller
{

    public function cancelAction($id)
    {
        $object = $this->admin->getSubject();

        if (!$object ) {
            throw new NotFoundHttpException(sprintf('Заказ номер %s не найден', $id));
        }

        if ($object->getStatus() === 1 ) {

            $this->addFlash('sonata_flash_info', sprintf('Невозможно отменить заказ номер %s, так как он уже завершён', $id));

            return new RedirectResponse($this->admin->generateUrl('list'));

//            throw new NotFoundHttpException(sprintf('Невозможно отменить заказ номер %s', $id));
        }

        if ($object->getStatus() === 2 ) {

            $this->addFlash('sonata_flash_info', sprintf('Невозможно отменить заказ номер %s, так как он уже отменён', $id));

            return new RedirectResponse($this->admin->generateUrl('list'));

        }

        $object->setStatus(2);

        $this->admin->update($object);
//        $clonedObject = clone $object;
//
//        $clonedObject->setName($object->getName().' (Clone)');
//
//        $this->admin->create($clonedObject);

        $this->addFlash('sonata_flash_success', 'Ваш заказ успешно отменён');

        return new RedirectResponse($this->admin->generateUrl('list'));

        // if you have a filtered list and want to keep your filters after the redirect
        // return new RedirectResponse($this->admin->generateUrl('list', ['filter' => $this->admin->getFilterParameters()]));

    }

}