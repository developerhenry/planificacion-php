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
       try{
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
        } catch (Exception $e) {
            return $this->json( $e->getMessage());
        }
    }

     /**
     * @Route("/buscar")
     * @Method("GET")
     */
    public function buscarAction(Request $request)
    {
        try{
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
        } catch (Exception $e) {
            return $this->json( $e->getMessage());
        }
    }


     /**
     * @Route("/insertar")
     * @Method("POST")
     */
    public function insertarAction(Request $request)
    {
        return $this->json(['status' => 'insertar' ]);
    }

     /**
     * @Route("/actualizar")
     * @Method("PATCH")
     */
    public function actualizarAction(Request $request)
    {
        return $this->json(['status' => 'actualizar' ]);
    }

     /**
     * @Route("/eliminar")
     * @Method("DELETE")
     */
    public function eliminarAction(Request $request)
    {
        return $this->json(['status' => 'eliminar' ]);
    }

}
