<?php

namespace Vworkit\VworkitBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Utilisateur\UtilisateurBundle\Entity\Utilisateur;
use Ob\HighchartsBundle\Highcharts\Highchart;


class StatController extends Controller {

    public function indexAction()
    {
        return $this->render('VworkitBundle:Stat:statistique.html.twig');
    }
    
    public function statAction() {
        // Chart
        $ob = new Highchart();
        $ob->chart->renderTo('linechart');
        $ob->title->text('Statistique des navigateurs les plus utilisés');
        $ob->plotOptions->pie(array(
            'allowPointSelect' => true,
            'cursor' => 'pointer',
            'dataLabels' => array('enabled' => true,'format'=>'<b>{point.name}</b>: {point.percentage:.1f} %'),
            
        ));
        $em = $this->getDoctrine()->getManager();
        $query=$em->createQuery('SELECT count(p.id) as nombre, p.navigateurUser as nav FROM UtilisateurBundle:Utilisateur p group by p.navigateurUser');
        $result = $query->getResult();
        //var_dump($result);
        $data=array();
        foreach ($result as $values){
            $a=array($values['nav'],intval($values['nombre']));
           
            array_push($data, $a);
        }
        
        $ob->series(array(array('type' => 'pie', 'name' => 'Browser share', 'data' => $data)));

        return $this->render('VworkitBundle:Stat:stat.html.twig', array(
                    'chart' => $ob
        ));
    }

}
