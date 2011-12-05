<?php

/**
 * Answer
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Answer extends BaseAnswer
{
    public function getUrl(){
        return "/question/show?&id=".$this->id;
    }
    
    /**
     * 
     * Sum the number of each answer 
     * @param array $answersArray
     */
    public static function generateAnswersGraph($answersArray)
    {
    	$html = "";
    	$sum = array();
    	$sum['A'] = 0;
    	$sum['B'] = 0;
    	$sum['C'] = 0;
    	$sum['D'] = 0;
    	$sum['E'] = 0;
    	
    	foreach ($answersArray as $answer)
    	{
    		if($answer['mc_chocie']=='A') {
    			$sum['A'] += 1; 
    		} else if($answer['mc_chocie']=='B'){
    			$sum['B'] += 1;
    		} else if($answer['mc_chocie']=='C'){
    			$sum['C'] += 1;
    		} else if($answer['mc_chocie']=='D'){
    			$sum['D'] += 1;
    		} else if($answer['mc_chocie']=='E'){
    			$sum['E'] += 1;
    		}
    	}
        	
    	foreach ($sum as $name=>$val)
   		{
   			$html .= '
		<div class="graph-item">
   			<div class="answer-mc" style="float: none; margin-bottom: 3px;">'.$name.'</div>
   			<div class="graph-bar" style="height: '.($val*10).'px;">'.$val.'</div>
   		</div>
   		';
   		}
   		
   		$html .= '
   		<div class="clear"></div>
   		<div style="text-align: left; margin-left: 0.5em;">Total: <b>'.count($answersArray).'</b></div>
   		';
   		return $html;
    }
}