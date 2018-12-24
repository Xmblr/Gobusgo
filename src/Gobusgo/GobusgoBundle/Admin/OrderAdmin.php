<?phpnamespace Gobusgo\GobusgoBundle\Admin;use Gobusgo\GobusgoBundle\Entity\Address;use Gobusgo\GobusgoBundle\Entity\Cargo;use Gobusgo\GobusgoBundle\Entity\User;use Sonata\AdminBundle\Admin\AbstractAdmin;use Sonata\AdminBundle\Datagrid\DatagridMapper;use Sonata\AdminBundle\Datagrid\ListMapper;use Sonata\AdminBundle\Form\FormMapper;use Sonata\AdminBundle\Form\Type\ModelListType;use Sonata\AdminBundle\Show\ShowMapper;use Symfony\Component\Form\Extension\Core\Type\ChoiceType;use Symfony\Component\Form\Extension\Core\Type\IntegerType;use Symfony\Component\Form\Extension\Core\Type\TextareaType;class OrderAdmin extends AbstractAdmin{    protected $baseRouteName = 'order_admin';    protected $baseRoutePattern = 'order_admin';    protected $datagridValues = [        '_page' => 1,        '_sort_order' => 'DESC',        '_sort_by' => 'id',    ];    public function toString($object)    {        return 'Просмотр заказа номер ' . $object->getId();    }    protected function configureFormFields(FormMapper $formMapper)    {        $formMapper//            ->with('Создание заявки', ['class' => 'col-md-6 col-xs-12 col-sm-6'])                ->add('userId', ModelListType::class, [                    'class'=>User::class,                'label'=>'Пользователь'            ], [                'admin_code'=>'admin.users'            ])            ->add('status', ChoiceType::class, [                'choices'=>[                    'В обработке' => 0,                    'Завершено' => 1,                    'Отменено' => 2                ],                'label' => 'Статус'            ])            ->add('cargoId', ModelListType::class, [                'class' => Cargo::class,                'label' => 'Шаблон груза',                'btn_delete' => false,                'required' => true            ], array(                'admin_code' => 'admin.cargo',            ))            ->add('shippingCity', ChoiceType::class, [                'choices' => [                    'Минск (склад)' => 'Минск (склад)',                    'Москва (склад)' => 'Москва (склад)'                ],                'label' => 'Откуда'            ])            ->add('deliveryCity', ChoiceType::class, [                'choices' => [                    'Москва (склад)' => 'Москва (склад)',                    'Минск (склад)' => 'Минск (склад)'                ],                'label' => 'Куда'            ])            ->add('quantityOfCargo', IntegerType::class, array('label' => 'Количество груза'))            ->add('notice', TextareaType::class, array('label' => 'Примечание', 'required' => false))//            ->end()//            ->with('Дополнительные услуги', ['class' => 'col-md-6 col-xs-12 col-sm-6'])            ->add('shippingAddressId', ModelListType::class, array(                'class' => Address::class,                'label' => 'Адрес вывоза груза',                'required' => false            ), array(                'admin_code' => 'admin.address'            ))            ->add('deliveryAddressId', ModelListType::class, array(                'class' => Address::class,                'label' => 'Адрес доставки груза',                'required' => false            ), array(                'admin_code' => 'admin.address'            ))//            ->end()//            ->with('Итоговая стоимость')            ->add('price', IntegerType::class, array('label' => 'Цена, BYN'))//            ->end();;    }    protected function configureDatagridFilters(DatagridMapper $datagridMapper)    {        $datagridMapper            ->add('id', null, array('label' => 'Номер заказа'))            ->add('status', null, array('label' => 'Статус'))            ->add('dateOfOrder', null, array('label' => 'Дата заявки'))            ->add('userId.fullName', null, array('label' => 'Пользователь'))            ->add('cargoId.name', null, array('label' => 'Груз'))            ->add('quantityOfCargo', null, array('label' => 'Кол-во груза'))            ->add('price', null, array('label' => 'Оценочная стоимость'))//            ->add('shippingAddressId', null, array('label' => 'Адрес отправки'))//            ->add('deliveryAddressId', null, array('label' => 'Адрес доставки'));    }    protected function configureListFields(ListMapper $listMapper)    {        unset($this->listModes['mosaic']);        $listMapper            ->addIdentifier('id', null, array('label' => 'Номер заказа'))            ->addIdentifier('status', null, array('template' => '@GobusgoGobusgo/Admin/CRUD/list_boolean.html.twig', 'label' => 'Статус'))            ->add('dateOfOrder', null, array('label' => 'Дата заявки'))            ->add('userId.fullName', null, array('label' => 'Пользователь'))            ->add('cargoId.name', null, array('label' => 'Груз'))            ->add('quantityOfCargo', null, array('label' => 'Кол-во груза'))            ->add('price', null, array('label' => 'Оценочная стоимость'))            ->add('_action', null, [                'label' => 'Действия',                'actions' => [                    'edit' => ['template' => '@GobusgoGobusgo/Admin/CRUD/list__action_edit.html.twig'],                    'show' => ['template' => '@GobusgoGobusgo/Admin/CRUD/list__action_show.html.twig'],                    'delete' => ['template' => '@GobusgoGobusgo/Admin/CRUD/list__action_delete.html.twig'],                ]            ]);    }    public function configureShowFields(ShowMapper $showMapper)    {        $showMapper            ->with('Общее', ['class' => 'col-md-6'])            ->add('id', null, array('label' => 'Номер заказа'))            ->add('status', null, array('template' => '@GobusgoGobusgo/Admin/CRUD/show_boolean.html.twig', 'label' => 'Статус'))            ->add('dateOfOrder', null, array('label' => 'Дата заказа'))            ->add('shippingCity', null, array('label' => 'Город отправки'))            ->add('deliveryCity', null, array('label' => 'Город доставки'))            ->add('quantityOfCargo', null, array('label' => 'Количество'))            ->add('price', null, array('label' => 'Цена, BYN'))            ->end()            ->with('Пользователь', ['class' => 'col-md-6'])            ->add('userId.username', null,array('label'=>'Имя пользователя'))            ->add('userId.organization', null,array('label'=>'Организация'))            ->add('userId.unp', null,array('label'=>'УНП'))            ->add('userId.legalAddress', null,array('label'=>'Юридический адрес'))            ->add('userId.fullName', null,array('label'=>'ФИО'))            ->add('userId.phone', null,array('label'=>'Телефон'))            ->end()            ->with('Груз', ['class' => 'col-md-6'])            ->add('cargoId.name', null, array('label' => 'Наименование'))            ->add('cargoId.weight', null, array('label' => 'Вес, КГ'))            ->end()            ->with('Откуда', ['class' => 'col-md-6'])            ->add('shippingAddressId.name', null, array('label' => 'Имя отправителя'))            ->add('shippingAddressId.organization', null, array('label' => 'Организация'))            ->add('shippingAddressId.city', null, array('label' => 'Город'))            ->add('shippingAddressId.street', null, array('label' => 'Адрес'))            ->end()            ->with('Куда', ['class' => 'col-md-6'])            ->add('deliveryAddressId.name', null, array('label' => 'Имя получателя'))            ->add('deliveryAddressId.organization', null, array('label' => 'Организация'))            ->add('deliveryAddressId.city', null, array('label' => 'Город'))            ->add('deliveryAddressId.street', null, array('label' => 'Адрес'))            ->end()            ->with('Дополнительная информация', ['class' => 'col-md-6'])            ->add('notice', null, array('label' => 'Примечание'))            ->end();    }}