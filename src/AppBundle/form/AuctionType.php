<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 31.03.2018
 * Time: 23:45
 */

namespace AppBundle\form;


use AppBundle\Entity\Auction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuctionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("title", TextType::class, ['label' => 'Tytuł'])
            ->add("description", TextareaType::class, ['label' => 'Opis'])
            ->add("price", NumberType::class, ['label' => 'Cena'])
            ->add("startingPrice", NumberType::class, ["label"=>"Cena wywoławcza"])
            ->add("expiresAt", DateTimeType::class,
                ["label"=>"Data zakończenia", "data" => new \DateTime("+1 day + 10 minutes")])
            ->add("submit", SubmitType::class, ['label' => 'Zapisz']);

    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(["data_class" => Auction::class]);
    }
}