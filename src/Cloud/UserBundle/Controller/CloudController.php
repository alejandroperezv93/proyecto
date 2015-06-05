<?php

namespace Cloud\UserBundle\Controller;

use itrascastro\TUserBundle\Form\Type\SignUpType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Cloud\UserBundle\Entity;
use Cloud\UserBundle\Models\Document;
use Cloud\UserBundle\Entity\Fitxer;

use Symfony\Component\HttpFoundation\Session\Session;

class CloudController extends Controller
{
    /**
     * Lists all Bookmark entities.
     *
     * @Route("/index", name="index")

     * @Template()
     * @Security("has_role('ROLE_USER')")
     */
    public function indexAction()
    {
        // *******Obtiene el user id ****************

        $em = $this->getUser();
        $id= $em->getID();
        //********************************************









        $em= $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT  DISTINCT    p.description, p.modificacion, p.nombre, c.username,p.id,c.id id_categoria
                FROM CloudUserBundle:Fitxer p,
                TUserBundle:USER c WHERE  p.idUser='.$id.'AND c.username=p.description AND p.eliminado=FALSE '
        );
        $entities =$query->getResult();






        $em2= $this->getDoctrine()->getManager();
        $query2 = $em2->createQuery(
            'SELECT  DISTINCT  f.id idf,  co.id, u.username, f.nombre
                FROM CloudUserBundle:compartir co,
                TUserBundle:USER u,
                CloudUserBundle:Fitxer f

                WHERE  (co.idUser2='.$id.'AND co.idUser1=u.id AND f.id=co.idFitxer)OR
                (co.idUser1='.$id.'AND co.idUser2=u.id AND f.id=co.idFitxer)'
        );
        $entities2 =$query2->getResult();


        $em3= $this->getDoctrine()->getManager();
        $query3 = $em3->createQuery(
            'SELECT  DISTINCT    p.description, p.modificacion, p.nombre, c.username,p.id,c.id id_categoria
                FROM CloudUserBundle:Fitxer p,
                TUserBundle:USER c WHERE  p.idUser='.$id.'AND c.username=p.description AND p.eliminado=TRUE '
        );
        $entities3 =$query3->getResult();




        $em4= $this->getDoctrine()->getManager();
        $query4 = $em4->createQuery(
            'SELECT  DISTINCT    p.description, p.modificacion, p.nombre, c.username,p.id,c.id id_categoria
                FROM CloudUserBundle:Fitxer p,
                TUserBundle:USER c WHERE  p.idUser='.$id.'AND c.username=p.description AND p.eliminado=FALSE AND p.favorito=TRUE'
        );
        $entities4 =$query4->getResult();


        return array(
            'entities' => $entities
        ,
            'entities2'=> $entities2,
            'entities3'=> $entities3,
            'entities4'=> $entities4
        );
    }
    /**
     * Lists all Bookmark entities.
     *
     * @Route("/detalle/{id}", name="detalle")
     * @Method("GET")
     * @Template()
     * @Security("has_role('ROLE_USER')")
     */

    public function detalleAction($id)
    {
        // $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CloudUserBundle:Recursos')->find($id);

        if(!$entities){

            throw $this->createNotFoundException(
                "no existe el pr".$id
            );

        }

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Lists all Bookmark entities.
     *
     * @Route("/test", name="test")
     * @Method("GET")
 */
    public function TestAction()
    {

        $em= $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT   p.titulo,  p.detalle, p.id_Categoria,c.id id_categoria,c.nombre categoria
                FROM CloudUserBundle:Noticias p
                JOIN CloudUserBundle:Categoria c WITH c.id= p.id_Categoria'
    );
        $datos =$query->getResult();
        print_r($datos);exit;
        return $this->render('CloudUserBundle:Cloud:test.html.twig',compact("datos"));

        }

  /**
   *
   *
   * @Route("/testreal", name="testreal")
   * @Method("GET")
   * @Template()
    * */
    public function TestrealAction()
    {

        $em= $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT     p.nombre, c.username,p.id,c.id id_categoria
                FROM CloudUserBundle:Fitxer p
                JOIN TUserBundle:USER c WITH c.id= p.id'
        );
        $datos =$query->getResult();
        return $this->render('CloudUserBundle:Cloud:testreal.html.twig',compact("datos"));


    }



    /**
     *
     *
     * @Route("/upload", name="upload")
     * */
    public function UploadAction(Request $request)
    {

        if($request->getMethod()== 'POST')
        {

            $em = $this->getUser();
            $id= $em->getID();
            $nombre=$em->getUsername();
            $image= $request->files->get('file');
            $image2= $request->files->get('file');
            print_r($image);exit;
            if(($image instanceof UploadedFile)&&($image->getError()=='0')){
                $originalName =$image->getClientOriginalName();
                $name_array= explode('.',$originalName);
                $file_type= $name_array[sizeof($name_array)-1];
                $valid_filetypes =array('jpg','jpeg','png');
                if(in_array(strtolower($file_type),$valid_filetypes)){
                    $document =new Document();
                    $document->setFile($image2);
                    $document->setSubDirectory('archivos');
                    $document->processFile();
                    $archivo =new Fitxer();
                    $archivo->setNombre($originalName);
                    $archivo->setDescription($nombre);
                    $archivo->setEliminado(FALSE);

                    $archivo->setIdUser($id);

                    $em =$this->getDoctrine()->getManager();
                    $em->persist($archivo);
                    $em->flush();

                    $this->get('session')->getFlashBag()->add(
                        'mensaje',
                        'el archivo se subio correctamente'
                    );
                    return $this->redirect($this->generateUrl('index'));
                }else{
                    $this->get('session')->getFlashBag()->add(
                      'mensaje',
                        'la extension del archio no es la correcta'
                    );
                }

            }else{

                die('no ha entrado el archivo');
            }
        }
        return $this->render('CloudUserBundle:Cloud:upload.html.twig');


    }



    /**
     * @Route("/papelera/{id}", name="papelera")
     * @Template()
     */
    public function papeleraAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('CloudUserBundle:Fitxer')->find($id)->setEliminado(TRUE);


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Bookmark entity.');
        }

        $em->flush();
        $this->get('session')->getFlashBag()->add(
            'mensaje',
            'el archivo se elimino correctamente'
        );
        return $this->redirect($this->generateUrl('index'));


    }


















    /**
     * @Route("/hellwo/{id}", name="_demo_hello")
     * @Template()
     */
    public function deleteAction($id)
    {

            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CloudUserBundle:Fitxer')->find($id);


            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Bookmark entity.');
            }

            $em->remove($entity);
            $em->flush();
        $this->get('session')->getFlashBag()->add(
            'mensaje',
            'el archivo se elimino correctamente'
        );
        return $this->redirect($this->generateUrl('index'));


    }


    /**
     *
     *
     * @Route("/compartir/ ", name="compartir")
     * */
    public function CompartirAction()
    {




        // *******Obtiene el user id ****************

        $em = $this->getUser();
        $id= $em->getID();
        //********************************************

        $em= $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT  DISTINCT  f.id idf,  co.id, u.username, f.nombre
                FROM CloudUserBundle:compartir co,
                TUserBundle:USER u,
                CloudUserBundle:Fitxer f

                WHERE  (co.idUser2='.$id.'AND co.idUser1=u.id AND f.id=co.idFitxer)OR
                (co.idUser1='.$id.'AND co.idUser2=u.id AND f.id=co.idFitxer)'
        );
        $entities =$query->getResult();

        return $this->render('CloudUserBundle:Cloud:compartir.html.twig',compact('entities'));


    }



     /**
      * compartirdoAction
      *
      * Description
      *
      * @Route("/compartirdo", name="compartirdo")
      * **/
    public function CompartirDoAction(Request $request)
    {
        /**id User1**/
        $em = $this->getUser();
        $id= $em->getID();

        /*************/

        if($request->getMethod()== 'POST'){
            $image= $request->get('username');
            $idFichero= $request->get('numero');
            $nom= $request->get('nom');


            $em = $this->getDoctrine()->getEntityManager();

            $post = $em->getRepository('TUserBundle:User')->findOneBy(array('username'=>$image));

            if (!$post) {
                throw $this->createNotFoundException('Unable to find Blog post.');
            }

            $query = $post->getId();











            $document =new Entity\compartir();
            $document->setIdUser1($id);
            $document->setNombre($nom);
            $document->setIdFitxer($idFichero);
            $document->setIdUser2($query);


            $em =$this->getDoctrine()->getManager();
            $em->persist($document);
            $em->flush();
            return $this->redirect($this->generateUrl('index'));
        }
        die('adios');
        exit;
    }




    /**
     * @Route("/download/{nombre}", name="download")
     **/
    public function downloadAction($nombre){
        $fichero =  'uploads/archivos/'.$nombre;

        if (file_exists($fichero)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.'$fichero["basename"]');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($fichero));
            readfile($fichero);
            exit;
        }die('no hay archivo'); exit;
    }
    /**
     * @Route("/editar/{id}", name="_demo_hello")
     * @Template()
     */
    public function editarAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('TUserBundle:User')->find($id);

        if(!$entities){

            throw $this->createNotFoundException(
                "no existe el pr".$id
            );

        }

        return array(
            'entities' => $entities,
        );}

}