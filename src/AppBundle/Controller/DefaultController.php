<?php

namespace AppBundle\Controller;

use Acme\Computer\Computer;
use Acme\Computer\SerialNumber;
use Acme\Fault\Fault;
use Acme\Fault\FaultCode;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $fault = new Fault(new FaultCode('V_110'), 'No video output');

        $computer = new Computer(new SerialNumber(123456), $fault);

        $computer->bookForRepair();

        var_dump($computer);

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
        ));
    }
}
