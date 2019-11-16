<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Usuarios;
/**
 * @Route("/usuario")
 */
class UsuariosController extends Controller
{
     /**
    * @Route("/", name="homepage")
    */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        $r=['status'=>0,'usuario::'=>'ok']; 
    
        return$this->json($r);
    
    }
   /**
     * @Route("/listar")
     * @Method("GET")
     */
    public function listarAction(Request $request)
    {
        
            $usuario = $this->getDoctrine()->getRepository(Usuarios::class)->findAll();
            $row = [];
            foreach ($usuario as $rw){
                $row[] =  ['nombre' => $rw->getNombre(),
                            'usuario'=> $rw->getUsuario(),
                            'clave'=> $rw->getClave()]; 
            }
            $r = ['status' => 0,'Listado' => $row];
           
            return $this->json($r);
        
    }

    /**
     * @Route("/buscar")
     * @Method("GET")
     */
    public function buscarAction(Request $request)
    {
        
         //$get = json_decode(request-getContent());
         $usu = $request->query-> get('usuario');
         $clave = $request->query-> get('clave');
        
            $usuario = $this->getDoctrine()->getRepository(Usuarios::class)
            ->findByOne(['usuario'=>$usu,'clave'=>$clave]);

            if(!$usuario){
                throw new Exception('error de contraseña',200);
                $r=['status' =>0,'msg'=>'ingreso correcto','nombre'=>$usuario ->getNombre()];
            }else{
                $r=['error' =>0,'msg'=>'error de usuario y contraseña'];
            


            $row = [];
            foreach ($usuario as $rw){
                $row[] =  ['nombre' => $rw->getNombre(),
                            'usuario'=> $rw->getUsuario(),
                            'clave'=> $rw->getClave()]; 
         
    }
        $r = ['status' => 0,'Buscar::' => $row,'Datos'=>$usu];
        return $this->json($r);
    }
        }


 /**
     * @Route("/insertar")
     * @Method("POST")
     */
    public function insertarAction(Request $request)
    {
        try{
            $post = json_decode($request->getContent(), true);
            $em = $this->getDoctrine()->getManager();

            $usuario = new Usuarios();
            $usuario->setNombre($post["nombre"]);
            $usuario->setUsuario($post["usuario"]);
            $usuario->setClave($post["clave"]);
            $em->persist($usuario);

            $em->flush();

            $r = ['status' => 0,'Insertar::' => 'ok','Data' =>$post['nombre'] ];
            return $this->json($r);
        } catch (Exception $e) {
            throw $e->getMessage();
        }
       
    }


 /**
     * @Route("/actualizar/{id}", requirements={"id": "\d+"})
     * @Method("PATCH")
     */
    public function actualizarAction(Request $request, $id)
    {
        try{
            $post = json_decode($request->getContent(), true);
            $em = $this->getDoctrine()->getManager();

            $usuario = $this->getDoctrine()->getRepository(Usuarios::class)
            ->find($id);
            if(!$usuario){
                $r= ['msg' => 'Usuario no existe'];
               return $this->json($r);
            }
            $usuario->setNombre($post["nombre"]);
            $usuario->setUsuario($post["usuario"]);
            $usuario->setClave($post["clave"]);
            $em->persist($usuario);

            $em->flush();

            $r = ['status' => 0,'Actualizado::' => 'ok','Data' =>$post['nombre'] ];
            return $this->json($r);
        } catch (Exception $e) {
            throw $e->getMessage();
        }
    }

    /**
     * @Route("/eliminar/{id}", requirements={"id": "\d+"})
     * @Method("DELETE")
     */
    public function eliminarAction(Request $request, $id)
    {
        try{
            
            $em = $this->getDoctrine()->getManager();

            $usuario = $this->getDoctrine()->getRepository(Usuarios::class)
            ->find($id);
            if(!$usuario){
                $r= ['msg' => 'Usuario no existe'];
                return $this->json($r);
            }
            $em->remove($usuario);
            $em->flush();

            $r = ['status' => 0,'Eliminar::' => 'ok'];
            return $this->json($r);
        } catch (Exception $e) {
            throw $e->getMessage();
        }
    }
}