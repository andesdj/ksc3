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

class GalleryKscType extends AbstractType {

	/**
	 * {@inheritdoc}
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder
				->add('initial', TextType::class, array(
					"label" => 'Initials (max 2 Letters): ',
					'attr' => array('class' => 'form-control')))
				->add('gallery')
				->add('description', TextType::class, array(
					"label" => 'Group name: ',
					'attr' => array('class' => 'form-control')))
				->add('gallery', EntityType::class, array(
					// query choices from this entity

					'class' => 'AppBundle:GroupsKsc',
					"label" => 'Select a Group: ',
					// use the User.username property as the visible option string
					'choice_label' => 'name',
					'attr' => array('class' => 'form-control')
				))
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
	public function configureOptions(OptionsResolver $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\GalleryKsc'
		));
	}

	/**
	 * {@inheritdoc}
	 */
	public function getBlockPrefix() {
		return 'appbundle_galleryksc';
	}

}
