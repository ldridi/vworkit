<?php

namespace Vworkit\VworkitBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Utilisateur\UtilisateurBundle\Entity\Utilisateur;
use Ob\HighchartsBundle\Highcharts\Highchart;


class StatCategorieController extends Controller {

    public function statcategorieAction() {
        // Chart
        $ob = new Highchart();
        $ob->chart->renderTo('linechartC');
        $ob->title->text('Statistique des projets par categorie');
        $ob->plotOptions->pie(array(
            'allowPointSelect' => true,
            'cursor' => 'pointer',
            'dataLabels' => array('enabled' => true,'format'=>'<b>{point.name}</b>: {point.percentage:.1f} %'),
            
        ));
        $em = $this->getDoctrine()->getManager();
        $query=$em->createQuery('SELECT count(p.id) as nombre, c.nomCategories as cat FROM VworkitBundle:Projet p JOIN p.categorie c group by p.categorie');
        $result = $query->getResult();
        //var_dump($result);
        $data=array();
        foreach ($result as $values){
            $a=array($values['cat'],intval($values['nombre']));
           
            array_push($data, $a);
        }
        
        $ob->series(array(array('type' => 'pie', 'name' => 'Browser share', 'data' => $data)));

        return $this->render('VworkitBundle:Stat:statcategorie.html.twig', array(
                    'chartC' => $ob
        ));
    }

}
