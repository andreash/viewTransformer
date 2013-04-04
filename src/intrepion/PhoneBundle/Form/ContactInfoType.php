<?php

namespace intrepion\PhoneBundle\Form;

use intrepion\PhoneBundle\Transformer\PhoneNumberTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactInfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new PhoneNumberTransformer();
        $builder
            ->add($builder->create('home', 'text')->addViewTransformer($transformer))
            ->add('cell')
            ->add('work')
            ->add('fax')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'intrepion\PhoneBundle\Entity\ContactInfo'
        ));
    }

    public function getName()
    {
        return 'intrepion_phonebundle_contactinfotype';
    }
}
