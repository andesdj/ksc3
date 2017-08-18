<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

//Form Types aditionals

use Symfony\Component\Form\Extension\Core\Type\HiddenType;


use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SumbitType;





class MediaKscType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//    ->add('size')
//    ->add('duration')
//    ->add('urlLd')
//    ->add('urlThumb')
//    ->add('dateCreated', 'datetime')
//    ->add('dateObject', 'datetime')
//    ->add('color')
//    ->add('resolution')
//    ->add('gallery')
//    ->add('tags')
//	  ->add('format')
  
            
            ->add('name',TextType::class,array(
			"label"=>'Object Name: ',	
			'attr' => array('class' => 'form-control')))
            ->add('subhead',TextType::class,array(
			"label"=>'Subhead: ',	
			'attr' => array('class' => 'form-control')))
            
			->add('url', FileType::class, array(
			"label"	=>"Upload file",
				
			"attr"=>array("class"=>"file-styled form-control"),
			"data_class"=> null
			))        
            ->add('description',TextType::class,array(
			"label"=>'Description: ',	
			'attr' => array('class' => 'form-control')))
            
            ->add('copy',TextType::class,array(
			"label"=>'Copyright: ',	
			'attr' => array('class' => 'form-control')))
            ->add('state', ChoiceType::class, array(
				"label"=>'Status',
				'attr' => array('class' => 'form-control'),
                'choices'  => array(
                '1' => "Active",
                '0' => "Inactive",
             
            )))
           ;
         //   ->add('idUser')
        
    }


        public function getExtendedType()
    {
        // use FormType::class to modify (nearly) every field in the system
        return FileType::class;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\MediaKsc'
        ));
    }
}
