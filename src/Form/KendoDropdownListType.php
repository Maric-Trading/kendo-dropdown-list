<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MaricTrading\KendoDropdownList\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\Factory\ChoiceListFactoryInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;


class KendoDropdownListType extends TextType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $defaults = [
            'attr' => [
                'remoteUrl'=>'',
                'labelField'=>'id',
                'valueField'=>'name'
            ],
        ];
        $resolver->setDefaults($defaults);
    }

    public function getParent()
    {
        return TextType::class;
    }

    public function getBlockPrefix(): string
    {
        return 'kendodropdownlist';
    }
}
