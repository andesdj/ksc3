<?php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
//Form Types aditionals
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SumbitType;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
				->add('name', TextType::class, array(
					"label" => 'Your Name: ',
					'attr' => array('class' => 'form-control')))
				->add('surname', TextType::class, array(
					"label" => 'Your Surname: ',
					'attr' => array('class' => 'form-control')))

				->add('email', EmailType::class, array(
					"label" => 'Your Email: ',
					'attr' => array('class' => 'form-control')))
				
				->add('password', RepeatedType::class, array(
					'type' => PasswordType::class,
					'invalid_message' => 'The password fields must match.',
					'options' => array('attr' => array('class' => 'password-field')),
					'required' => true,
					'first_options'  => array('label' => 'Password'),
					'second_options' => array('label' => 'Repeat Password'),
					'attr' => array('class' => 'form-control')
					))
						
					->add('state', ChoiceType::class, array(
					"label" => 'Status',
					'attr' => array('class' => 'form-control'),
					'choices' => array(
						'1' => "Active",
						'0' => "Inactive",	
					)));
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }

}
