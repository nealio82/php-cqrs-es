<?php

namespace AppBundle\Controller;

use Acme\Computer\Computer;
use Acme\Computer\SerialNumber;
use Acme\Fault\Fault;
use Acme\Fault\FaultCode;
use Acme\Repair\RepairJob;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    private $errors = [
        ['code' => 'V_110', 'fault' => 'No video output'],
        ['code' => 'H_250', 'fault' => 'Slow hard drive'],
        ['code' => 'R_100', 'fault' => 'RAM not found'],
        ['code' => 'H_240', 'fault' => 'Unable to save files'],
        ['code' => 'V_300', 'fault' => 'Intermittent video'],
        ['code' => 'M_86', 'fault' => 'Wired mouse not detected'],
        ['code' => 'M_87', 'fault' => 'Wireless mouse not detected'],
        ['code' => 'K_100', 'fault' => 'Wireless keyboard not detected'],
        ['code' => 'K_102', 'fault' => 'F1 key not working'],
        ['code' => 'P_10', 'fault' => 'No power'],
    ];

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

//        for ($i = 0; $i < 100; $i++) {
//
//            $fault = $this->errors[rand(0, count($this->errors) - 1)];
//
//            $computer = new Computer(new SerialNumber(rand(0, 999999)), new Fault(new FaultCode($fault['code']), $fault['fault']));
//
//            $computer->bookForRepair();
//
//        }


//        var_dump($computer);

        $jobs = $this->getDoctrine()->getRepository(RepairJob::class)->findAll();

        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
            'repair_jobs' => $jobs
        ));
    }
}
