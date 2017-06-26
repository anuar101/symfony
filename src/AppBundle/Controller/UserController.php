<?php
namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Entity\Pdf;
use AppBundle\Entity\Template;
use AppBundle\Form\UserType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\ClassLoader\UniversalClassLoader;
use Spipu\Html2Pdf\Html2Pdf;

class UserController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        ini_set('MAX_EXECUTION_TIME', -1);
        $user = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
        $form = $this->createForm(UserType::class);

        return $this->render('index.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/user/homewelcome", name="homewelcome", options={"expose"=true})
     */
    public function homeWelcomeAction()
    {
        return $this->render('news_add.html.twig', array(
            'user' => 'adf',
            'form' => 'aaa',
        ));
    }
    

    /**
     * @Route("/user/panels_wells", name="panels_wells", options={"expose"=true})
     */
    public function panels_wellsRecordsAction()
    {
        return $this->render('elements/panels_wells.html.twig', array(
            'user' => 'adf',
            'form' => 'aaa',
        ));
    }
        /**
     * @Route("/user/buttons", name="buttons", options={"expose"=true})
     */
    public function buttonsRecordsAction()
    {
        return $this->render('elements/buttons.html.twig', array(
            'user' => 'adf',
            'form' => 'aaa',
        ));
    }
        /**
     * @Route("/user/notifications", name="notifications", options={"expose"=true})
     */
    public function notificationsRecordsAction()
    {
        return $this->render('elements/notifications.html.twig', array(
            'user' => 'adf',
            'form' => 'aaa',
        ));
    }
        /**
     * @Route("/user/typography", name="typography", options={"expose"=true})
     */
    public function typographyRecordsAction()
    {
        return $this->render('elements/typography.html.twig', array(
            'user' => 'adf',
            'form' => 'aaa',
        ));
    }
        /**
     * @Route("/user/icons", name="icons", options={"expose"=true})
     */
    public function iconsRecordsAction()
    {
        return $this->render('elements/icons.html.twig', array(
            'user' => 'adf',
            'form' => 'aaa',
        ));
    }
        /**
     * @Route("/user/grid", name="grid", options={"expose"=true})
     */
    public function gridRecordsAction()
    {
        return $this->render('elements/grid.html.twig', array(
            'user' => 'adf',
            'form' => 'aaa',
        ));
    }
        /**
     * @Route("/user/tables", name="tables", options={"expose"=true})
     */
    public function tablesRecordsAction()
    {
        return $this->render('tables/tables.html.twig', array(
            'user' => 'adf',
            'form' => 'aaa',
        ));
    }

    /**
     * @Route("/user/forms", name="forms", options={"expose"=true})
     */
    public function formsRecordsAction()
    {
        return $this->render('forms/forms.html.twig', array(
            'user' => 'adf',
            'form' => 'aaa',
        ));
    }

    /**
     * @Route("/user/generatepdf", name="generatepdf", options={"expose"=true})
     */
    public function generatePdfAction()
    {
        return $this->render('pdf/pdflayout.html.twig', array(
            'user' => 'adf',
            'form' => 'aaa',
        ));
    }


    /**
     * @Route("/user/flot", name="flot", options={"expose"=true})
     */
    public function flotRecordsAction()
    {
        return $this->render('charts/flot.html.twig', array(
            'user' => 'adf',
            'form' => 'aaa',
        ));
    }
    /**
     * @Route("/user/morris", name="morris", options={"expose"=true})
     */
    public function morrisRecordsAction()
    {
        return $this->render('charts/morris.html.twig', array(
            'user' => 'adf',
            'form' => 'aaa',
        ));
    }

    /**
     * @Route("/user/generatePdf", name="generatePdf", options={"expose"=true})
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function generatePdfRecordsAction(Request $request)
    {
        ini_set('MAX_EXECUTION_TIME', -1);
        $em = $this->getDoctrine()->getManager();
        $pdf = new Pdf();
        $htmlTemplate = new Template();
        $template = $htmlTemplate::$pdfTemplateDefault;
        if (!empty($template)) {//This is to check if template variable was empty or not
            $wordInTemplate = array(
                '##TITLE##',
                '##DESCRIPTION_1##',
                '##DESCRIPTION_2##',
                '##DESCRIPTION_3##',
                '##DESCRIPTION_4##',
                '##FULLNAME##',
                '##CONTACT##',
                '##EMAIL_ADDRESS##',
                '##WEBSITE##',
                '##HEADING##'
            );
            $replaceInTemplete = array(
                $request->request->get('title'),
                $request->request->get('description1'),
                $request->request->get('description2'),
                $request->request->get('description3'),
                $request->request->get('description4'),
                $request->request->get('fullname'),
                $request->request->get('contact'),
                $request->request->get('emailaddress'),
                $request->request->get('website'),
                $request->request->get('heading')
            );
        }
        $template = str_replace($wordInTemplate, $replaceInTemplete, $template);
        $dimentional = array(352.78,236.01);
        $direction = "L";
        $filename = time().'.pdf';
        $result = $this->generatePdfData($template, $dimentional, $filename, $direction);
        if($result == true){
            $pdffilename = 'http://127.0.0.1:8000/'.$filename.'?r=#zoom=Fit&toolbar=0';
            return new Response(json_encode($pdffilename)); 
        }else{
            $pdffilename = 'http://127.0.0.1:8000/'.$filename.'?r=#zoom=Fit&toolbar=0';
            return new Response(json_encode($pdffilename)); 
        }
    }

    function generatePdfData($template, $dimentional, $pdfName, $direction)
    {
        try {
            $html2pdf = new Html2Pdf($direction, $dimentional, 'en', true, 'UTF-8');
            $html2pdf->Addfont('angelina-light');
            $html2pdf->Addfont('opansans-regular');
            $html2pdf->Addfont('oswald-regular');
            $html2pdf->Addfont('oswald_light');
            $html2pdf->Addfont('opansans-light');
            $html2pdf->writeHTML($template, isset($_GET['vuehtml']));
            $html2pdf->Output($pdfName, 'F');
            return TRUE;
        } catch (Html2PdfException $e) {
            $formatter = new ExceptionFormatter($e);
            $formatter->getHtmlMessage();
            return FALSE;
        }
    }

    /**
     * @Route("/user/update/{id}", name="update_user", options={"expose"=true})
     * @param User $id
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function updateRecordAction($id,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $usr = $em->getRepository('AppBundle:User')->find($id);
        if (!$usr) {
            throw $this->createNotFoundException(
                'No record found for id '.$id
            );
        }
        $usr->setName($request->request->get('user')['name']);
        $usr->setAge($request->request->get('user')['age']);
        $usr->setRemarks($request->request->get('user')['remarks']);
        $em->flush();
        $records = [
            'id'      => $usr->getId(),
            'name'      => $usr->getName(),
            'age'       => $usr->getAge(),
            'remarks'   => $usr->getRemarks(),
        ];
        return new Response(json_encode(array($records)), 200);
    }

    /**
     * @Route("/user/new", name="new_user", options={"expose"=true})
     * @param Request $request
     * @return JsonResponse|Response
     */
    public function newRecordAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(array('message' => 'Use only ajax please!'), 400);
        }

        $form = $this->createForm(UserType::class, $user = new User());
        $form->handleRequest($request);

        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $htmlResult ='<tr role="row"><td class="sorting_1" id="a'.$user->getId().'">'.$user->getName().'</td><td  id="b'.$user->getId().'">'.$user->getAge().'</td><td  id="c'.$user->getId().'">'.$user->getRemarks().'</td><td class="text-center"><i data-toggle="tooltip" title="View records" onclick="updateAndviewDetails("'.$user->getId().'","'.$user->getName().'","'.$user->getAge().'","'.$user->getRemarks().'",0); return false;"  class="fa fa-arrows viewUser" aria-hidden="true"></i> | <i  data-toggle="tooltip" title="Delete records" id="'.$user->getId().'" dataname="'.$user->getName().'" class="fa fa-trash deleteUser removebutton" aria-hidden="true"></i> | <i  data-toggle="tooltip" title="Update records" onclick="updateAndviewDetails("'.$user->getId().'","'.$user->getName().'","'.$user->getAge().'","'.$user->getRemarks().'",1); return false;" id="'.$user->getId().'" class="fa fa-pencil updateUser" aria-hidden="true"></i></td></tr>';
            return new Response($htmlResult, 200);
        }else{
            $response = new JsonResponse(
                array(
                    'message' => 'Error',
                    'form' => $this->renderView('user/newUser.html.twig',
                        array(
                            'form' => $form->createView(),
                        ))), 400);

            return $response;
        }   
    }

    /**
     * @Route("/user/{id}/delete/", name="delete_user", options={"expose"=true})
     * @param User $id
     * @return Response
     */
    public function deleteUserAction(User $id)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($id);
        $em->flush();

        return new Response();
    }


    /**
     * @Route("/user/static_user", name="static_user", options={"expose"=true})
     */
    public function loadDataAction()
    {
        $resultRecords = $this->getDoctrine()
           ->getRepository('AppBundle:User')
           ->createQueryBuilder('e')
           ->select('e')
           ->getQuery()
           ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
           foreach ($resultRecords as $key => $value) 
           {
            $htmlData[] ='<tr><td>'.$value["name"].'</td><td>'.$value["age"].'</td><td>'.$value["remarks"].'</td><td class="text-center"><i data-toggle="tooltip" title="View records" onclick="updateAndviewDetails('.$value["id"].','.$value["name"].','.$value["age"].','.$value["remarks"].',0); return false;"  class="fa fa-arrows viewUser" aria-hidden="true"></i> | <i  data-toggle="tooltip" title="Delete records" id="'.$value["id"].'" dataname="'.$value["name"].'" class="fa fa-trash deleteUser removebutton" aria-hidden="true"></i> | <i  data-toggle="tooltip" title="Update records" onclick="updateAndviewDetails('.$value["id"].','.$value["name"].','.$value["age"].','.$value["remarks"].',1); return false;" id="'.$value["id"].'" class="fa fa-pencil updateUser" aria-hidden="true"></i></td></tr>';
           }
        return new JsonResponse($htmlData, 200);
    }
}