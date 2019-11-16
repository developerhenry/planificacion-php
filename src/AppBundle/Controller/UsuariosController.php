<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Usuarios;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
    * @Route("/user")
    */
class UsuariosController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager(); 
        $usuario = $em->getRepository('AppBundle:Usuarios')->findAll(); 
        $row = [];
        foreach($usuario as $o){
            $row[] =[
                'id' => $o->getId(),
                'nombre' => $o->getNomusuario(),
                'password' => $o->getClave()
            ];
        }

        // replace this example code with whatever you need
        return $this->json(['status' => 0 , 'data' => $row ]);
    }

     /**
     * @Route("/buscar", name="homepage")
     * @Method({"GET"})
     */
    public function buscarAction(Request $request)
    {
        $buscar = $request->query->get('buscar');
        if(!$buscar){
            return $this->json(['status' => 0 ]);
        }
        $em = $this->getDoctrine()->getEntityManager(); 
        $usuario = $em->getRepository('AppBundle:Usuarios')->findBy(['id' => $buscar ]);
        $row = [];
        foreach($usuario as $o){
            $row[] =[
                'id' => $o->getId(),
                'nombre' => $o->getNomusuario(),
                'password' => $o->getClave()
            ];
        }
        
        return $this->json(['status' => 0 , 'data' => $row ]);
       
    }


     /**
     * @Route("/insertar", name="homepage")
     * @Method({"POST"})
     */
    public function insertarAction(Request $request)
    {
        return $this->json(['status' => 'insertar' ]);
    }

     /**
     * @Route("/actualizar", name="homepage")
     * @Method({"PATCH"})
     */
    public function actualizarAction(Request $request)
    {
        return $this->json(['status' => 'actualizar' ]);
    }

     /**
     * @Route("/eliminar", name="homepage")
     * @Method({"DELETE"})
     */
    public function eliminarAction(Request $request)
    {
        return $this->json(['status' => 'eliminar' ]);
    }


}
