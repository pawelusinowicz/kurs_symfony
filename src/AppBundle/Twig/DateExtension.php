<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 07.04.2018
 * Time: 00:23
 */

namespace AppBundle\Twig;


class DateExtension extends \Twig_Extension
{
    /**
     * @return array|\Twig_Filter[]
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter("expireDate", [$this, "expireDate"])
        ];
    }

    public function expireDate(\DateTime $expireAt)
    {
        if($expireAt<new \DateTime("-7 days")) {
            return $expireAt->format("Y-m-d H:i");
        }

        if($expireAt>new \DateTime("-1 day")) {
            return " za ".$expireAt->format("d"). " dni";
        }

        return "za ".$expireAt->format("H"). " godz. ". $expireAt->format("i")." min.";

    }
}