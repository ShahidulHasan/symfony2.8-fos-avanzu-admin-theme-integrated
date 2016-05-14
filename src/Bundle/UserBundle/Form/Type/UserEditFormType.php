<?php
namespace Bundle\UserBundle\Form\Type;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserEditFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle'))
            ->add('email', 'email', array(
                'label' => 'form.email', 'translation_domain' => 'FOSUserBundle'
            ))
            ->add('groups', 'entity', array(
                'class' => 'Bundle\UserBundle\Entity\Group',
                'query_builder' => function(EntityRepository $groupRepository) {
                    return $groupRepository->createQueryBuilder('g')
                        ->andWhere("g.name != :group")
                        ->setParameter('group', 'Super Administrator');
                },
                'property' => 'name',
                'multiple' => true,
            ))
            ->add('profile', new ProfileFormType());
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Bundle\UserBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'user';
    }
}
