<?php

namespace AppBundle\Controller;

/** jose */

use AppBundle\Entity\Usuarios;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
    * @Route("/joselo")
    */
class JoseloController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->json(['status' => 0 , 'data' => $row ]);
    }
}
