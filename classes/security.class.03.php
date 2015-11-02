<?php
/*
@File:security.class.03.php
@Author:Shailender Singh
@Date:28/02/2015
@Email:hi2shailender@gmail.com
*/
############  Data handling  #######################

/**
 * filterEverything
 * use on all incoming $_POST data to do a general, all-in-one attempt to prevent XSS attacks. It will protect my server against most of them for now, but I expect you to improve on it considerably.
 *
 */
class Security   {

    protected $aFiltered;
    protected $testArray;


    function checkData(){
        if(!isset($_POST['submit']))
        {
            return false;
        }else
        {
            $this->filterEverything($_POST);
            
            foreach($this->formArray as $fieldName => $aInfo){
                //error_log(print_r($aInfo));
                $this->$aInfo['valid']($fieldName); // call_user_func() would be better
                //$func='$this->'.$aInfo['valid'];
                //is_callable($func)?error_log('OK'):error_log('not');
                //call_user_func($this->$aInfo['valid'], $fieldname );
            }
            
            if(in_array(false,$this->testArray)){
                return false;
            }else{
                return true;
            }
        }

    }


    // filter all input. That means Everything.
    function filterEverything($data){
        $this->aFiltered = array();
        foreach($data as $key => $value){
                $this->aFiltered[$key] = htmlentities(trim($value));
            }

    
        return $this->aFiltered;
    }

    function filterIt($value){
        return htmlentities(trim($value));
    }

    function checkEmpty($fieldName){
        //error_log($fieldName.__FILE__.__LINE__);
        if (empty($this->aFiltered[$fieldName]))     // you must be able to improve on this !!
        {
            $this->formArray[$fieldName]['msg']= '<span class="fail"> This field cannot be empty</span>';
            $this->testArray[$fieldName] = false;
        }
        else
        {
            $this->formArray[$fieldName]['msg']='<span class="ok"> Cool</span>';
            $this->testArray[$fieldName] = true;
        }
    } // end checkEmpty


    function chPhone($fieldName){
        $regex = '/^(?:[0-9\+() ]+$)/' ;
        if(!preg_match($regex,$this->aFiltered[$fieldName] )){
            $this->formArray[$fieldName]['msg']= '<span class="fail">SS Proper phone please</span>';
            $this->testArray[$fieldName] = false;

        }
        else
        {
            $this->formArray[$fieldName]['msg']='<span class="ok">SS Phone OK</span>';
            $this->testArray[$fieldName] = true;
        }

    } // end chPhone


} //end class
// EOF  classes/security.class.03.php