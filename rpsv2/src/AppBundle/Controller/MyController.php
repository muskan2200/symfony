<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\game;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class MyController extends Controller
{ 
     /**
    * @Route("/def", name="homepage")
    */
   public function defAction()
   {
       // replace this example code with whatever you need
       
       $game_doct=$this->getDoctrine()
       ->getRepository('AppBundle:game')
       ->findAll();
       
       return $this->render('myviews/def.html.twig',array('game_doct' => $game_doct));
   }
    /**
     * @Route("/watch", name="watchpage")
     */
    public function watchAction()
    {
        // replace this example code with whatever you need
        return $this->render('myviews/watch.html.twig');
    }

    /**
     * @Route(path= "/play" , name="playgame" , methods = { "GET" })
     */
    public function playaction(Request $request)
    {     
         $id=$request->query->get('id');
        // replace this example code with whatever you need
        if(isset($_GET['watch']))
        {
            $game_id=$_GET['list1'];
            $db = $this->getDoctrine()->getManager();
            $rp = $db->getRepository('AppBundle:game');
            $gm_obj= $rp->find($game_id);
            $userscore=$gm_obj->getUserScore();
            $compscore=$gm_obj->getCompScore();
            $userchoice=$gm_obj-> getUserChoice();
            $compchoice=$gm_obj->getCompChoice();
            $final_result=$gm_obj->getFinalResult();
            return $this->render('myviews/watch.html.twig',array('id' => $game_id ,'userscore' => $userscore,'compscore' => $compscore, 'userchoice' => $userchoice ,'compchoice' => $compchoice , 'final_result' => $final_result));
        }
         else if (isset($_GET['play']))
         {
            $game_id=$_GET['list1'];
            return $this->render('myviews/play.html.twig',array('id' => $game_id));

         }
         else{
            return $this->render('myviews/play.html.twig',array('id' => $id));
         }
         
    }

    /**
     * @Route(path ="/result"  , name="resultgame" , methods = { "GET" })
     */
    public function resultAction(Request $request)
    {
        $player_choice=$request->query->get('value');
      // $player_choice=$value;
         $id=$request->query->get('id');
         
        $Choosefrom= array('Rock', "Paper", "Scissors");

           $Choice= mt_rand(0,2);

       $Computer=$Choosefrom[$Choice];
       $userscore=0;
       $compscore=0;
       $db=$this->getDoctrine()->getManager();
       $result="";
       
       if($player_choice == $Computer)
       {
           $result='Draw';

        }
    
        else if ($player_choice == 'Rock' && $Computer == 'Scissors'){
    
        $result='win';
        $userscore++;
    
    
        }
    
        else if ($player_choice == 'Rock' && $Computer == 'Paper'){
    
            $result='lose';
            $compscore++;
          

        }
    
        else if ($player_choice == 'Scissors' && $Computer == 'Rock'){
    
        $result='lose';
        $compscore++;
    
    
        }
    
        else if ($player_choice == 'Scissors' && $Computer == 'Paper'){
    
       $result='win';
       $userscore++;
    
        }
    
        else if ($player_choice == 'Paper' && $Computer == 'Rock'){
    
        $result='win';
         $userscore++;
    
    
        }
    
        else if ($player_choice == 'Paper' && $Computer == 'Scissors'){
    
        $result='lose';
          $compscore++;
    
        }
         
        if($id==0)
        {   
            $user_scr=$userscore;
            $cmp_scr=$compscore;
            $game=new game;
            $key=$game->getId();
            $game->setUserScore($user_scr);
            $game->setCompScore($cmp_scr);
            $game->setUserChoice($player_choice);
            $game->setCompChoice($Computer);
            $game->setFinalResult($result);
            $db->persist($game);
            $db->flush();

        }
        else
        { 
             $key=$id;
             $rp = $db->getRepository(game::class);
             $gm_obj= $rp->find($key);
             $u_score=$gm_obj->getUserScore() + $userscore ;
             $c_score=$gm_obj->getCompScore() + $compscore ;
             $gm_obj->setUserScore($u_score);
             $gm_obj->setCompScore($c_score);
             $gm_obj->setUserChoice($player_choice);
             $gm_obj->setCompChoice($Computer);
             $gm_obj->setFinalResult($result);
             $db->persist($gm_obj);
            $db->flush();

        }  
	
        return $this->render('myviews/result.html.twig',   array( 'id' => $key,'player_choice' => $player_choice ,'computer_choice' => $Computer , 'result' =>$result,'userscore' => $userscore , 'compscore' => $compscore ));
    }

}
