<?php

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TaskController extends Controller
{
    /**
     * @Route("/task/number")
     */
    public function number()
    {
        $number = mt_rand(0, 100);

        return $this->render('task/number.html.twig', array(
            'number' => $number,
        ));
    }
}
