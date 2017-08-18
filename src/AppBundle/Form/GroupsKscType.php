<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SumbitType;





class GroupsKscType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
				
				
				->add('name', TextType::class,array(
					"label" => 'Group name: ',
					'attr' => array('class' => 'form-control')))
				
				->add('initial', TextType::class,array(
					"label" => 'Group Description: ',
					'attr' => array('class' => 'form-control')))
				
				->add('description', TextType::class,array(
					"label" => 'Description: ',
					'attr' => array('class' => 'form-control')))
				->add('status', ChoiceType::class, array(
					"label" => 'Status',
					'attr' => array('class' => 'form-control'),
					'choices' => array(
						'1' => "Active",
						'0' => "Inactive",
			)))		
				
				;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\GroupsKsc'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_groupsksc';
    }


}
