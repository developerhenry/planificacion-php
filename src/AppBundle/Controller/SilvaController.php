<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Silva;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
    * @Route("/silva")
    */
class SilvaController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->json(['status' => 'Silva']);
    }
}
