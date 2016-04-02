<?php

namespace Vworkit\VworkitBundle\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Utilisateur\UtilisateurBundle\Entity\Utilisateur;
use Ob\HighchartsBundle\Highcharts\Highchart;


class StatDateController extends Controller {

    public function statDateAction() {
        // Chart
        $ob = new Highchart();
        $ob->chart->renderTo('linechartD');
        $ob->title->text('Statistique des nombre d\'utilisateur inscrit par mois');
        $ob->plotOptions->pie(array(
            'allowPointSelect' => true,
            'cursor' => 'pointer',
            'dataLabels' => array('enabled' => true,'format'=>'<b>{point.name}</b>: {point.percentage:.1f} %'),
            'showInLegend' => true
        ));
        $em = $this->getDoctrine()->getManager();
        $query=$em->createQuery('SELECT count(p.id) as nombre, MONTH(p.dateAjoutUser) mois FROM UtilisateurBundle:Utilisateur p GROUP BY mois');
        
        $result = $query->getResult();
        //var_dump($result);
        $data=array();
        foreach ($result as $values){
            if($values['mois']==1) $values['mois']='Janvier';
            if($values['mois']==2) $values['mois']='Février';
            if($values['mois']==3) $values['mois']='Mars';
            if($values['mois']==4) $values['mois']='Avril';
            if($values['mois']==5) $values['mois']='Mai';
            if($values['mois']==6) $values['mois']='Juin';
            if($values['mois']==7) $values['mois']='Juillet';
            if($values['mois']==8) $values['mois']='Aout';
            if($values['mois']==9) $values['mois']='Septembre';
            if($values['mois']==10) $values['mois']='Octobre';
            if($values['mois']==11) $values['mois']='Novembre';
            if($values['mois']==12) $values['mois']='Décembre';
            $a=array($values['mois'],intval($values['nombre']));
           
            array_push($data, $a);
        }
        
        $ob->series(array(array('type' => 'pie', 'name' => 'Browser share', 'data' => $data)));

        return $this->render('VworkitBundle:Stat:statdate.html.twig', array(
                    'chart' => $ob
        ));
    }

}
