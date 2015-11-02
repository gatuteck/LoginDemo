<?php
/*
@File:html.class.03.php
@Author:Shailender Singh
@Date:28/02/2015
@Email:hi2shailender@gmail.com
@requires an array of quite complete information about each form field
*/

class makeHTML extends Security
{
    protected $formArray;           

    function __construct($aFormFields){
        // this is run every time the class is instaitiated

        $this->formArray = $aFormFields;

      
    }

    ###############  HTML writing methods
    function writeWholeForm()
    {
        $a='';
        $a.= $this->openForm();
        $a.= $this->makeFormRows();
        $a.= $this->makeSubmit();
        $a.= $this->closeForm();
        return $a;
        
    }
               
    // decide which type of control this one is
    // choose the right master method to write the whole row
    // returns all the controls for a form - set up by the formArray written for the purpose.
    function makeFormRows()
    {
        
        $a='';
        foreach($this->formArray as $fieldName=>$aInfo){
            if($aInfo['controlType'] == 'input'){
                $a .= $this->makeInputRow($fieldName);  
            }elseif($aInfo['controlType'] == 'select'){
                $a .=  $this->makeSelectRow($fieldName);
            }
        }
        return $a;
    } // end makeFormRows
  
    function openForm()
    {
        return '<form action="'.$_SERVER['SCRIPT_NAME'].'" method = "post">';
    
    }
   
    function makeLabel($fieldName)
    {
    
       return '<label for="'.$fieldName.'"  >'.$this->formArray[$fieldName]['label'].' : </label>'."\n";
    
    }
    

    
    function makeMessage($fieldName)
    {
        return  '<div id="'.$fieldName.'_msg">'.$this->formArray[$fieldName]['msg'].'</div>'."\n";
    }
    

    function makeInput($fieldName)
    {
    
        return '<div class="col2">
        <input
        type = "'.$this->formArray[$fieldName]['type'].'"
        name="'.$fieldName.'" 
        id="'.$fieldName.'"
        value="'.$this->aFiltered[$fieldName].'"/>
        </div>'."\n";
    }

    function makeInputRow($fieldName)
    {
        $a = '';
        $a .= $this->makeLabel($fieldName);
        $a .= $this->makeInput($fieldName);
        $a .= $this->makeMessage($fieldName);
        return $a;
    }
    function makeSubmit()
    {
        return '<input type = "submit" name="submit" value="Click me"  /><div class="clear"></div>';
    }
    function closeForm()
    {
    
        return '</form>';
    }
    
    /* makeSelect
        only requires the field name so that the right item in the forms array can be selected.  All other info is in that array as well.
    */
    function makeSelect($fieldName)
    {
        $arr = $this->formArray[$fieldName]['listValues'];
        
        $a='';
        $a.='<div class="col2">';
        $a.= '<select name="'.$fieldName.'" id="'.$fieldName.'">';
        $a.='<option value=""></option>';
        foreach($arr as $value=>$name){
            $a.='<option value="'.$value.'" ';
            $a.= ($value == $this->aFiltered[$fieldName])?' selected="selected" ':'';
            $a.='>'.$name.'</option>';
        }
        $a.='</select></div>';
        return $a;
    
    } // end makeSelect
    
    /*
    
    requires fieldname,validation (onchange), label, array of value=>name, 
    returns complete row w.select list with select=selected in the right place
    */
    function makeSelectRow($fieldName)
    {
        $a = '';
        $a .= $this->makeLabel($fieldName);
        $a .= $this->makeSelect($fieldName, $arr);
        $a .= $this->makeMessage($fieldName);
        return $a;
    }
    ############  End of form writing methods
    /*
    makeHeader()
    requires str title, str description
    returns everything from doctype to </head>
    
    */
    
    function makeHeader($title, $description="")
    {
        $head = '';
        $head .='<!doctype html>
                    <head>
                        <meta charset="utf-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
                        <title>'.$title.'</title>
                        <meta name="description" content="'.$description.'">
                        <link rel="stylesheet" href="css/styles.css">
                    </head>';
        return $head;
    }
    
    function makeFooter()
    {
        $a='';
        $a.='<script src="js/js.js" type="text/javascript"></script>';
        $a.='</body></html>';
        return $a;
    }
}// end class
// EOF classes/html.class.03.php