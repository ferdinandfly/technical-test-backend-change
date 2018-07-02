<?php
/**
 * Created by PhpStorm.
 * User: ferdinand
 * Date: 02/07/2018
 * Time: 22:32
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class CalculatorController extends Controller
{
    /**
     * @param string $type
     * @param int $amount
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @Route("/automaton/{type<[a-z0-9]+>}/change/{amount<\d+>}")
     */
    public function change(string $type, int $amount)
    {
        $register = $this->container->get('App\Registry\CalculatorRegistry');
        $calculator = $register->getCalculatorFor($type);

        if ($calculator !== null) {
            $change = $calculator->getChange($amount);
            if (!$change){
                return new JsonResponse("can not treat the number", "204");
            }
            $encoders = array(new XmlEncoder(), new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());

            $serializer = new Serializer($normalizers, $encoders);

            $jsonContent = $serializer->serialize($change, 'json');
            return JsonResponse::fromJsonString($jsonContent);
        } else {
            return new JsonResponse("not found", "404");
        }
    }
}