<?php
/*
@File:login.php
@Author:Shailender Singh
@Date:28/02/2015
@Email:hi2shailender@gmail.com
*/
require_once('conf/config.php');
require_once 'classes/security.class.03.php';
require_once 'classes/html.class.03.php';

$loginForm= new makeHTML($login);
if($loginForm->checkData()){ // this checks is there is any $_POST, then filters and validates. If everything is OK sends user to the success page. 
    header('Location: success.php');
} else {
   $formHTML = $loginForm->writeWholeForm($login);
} //end if/else checkData()
$title = 'form';

// this is a static call to a method. The class does not have to be instantiated.
echo makeHTML::makeHeader($title);

echo '<h1>With a config file, static calls to methods</h1>';
echo '<div id="content">';
    echo $formHTML;
 echo '</div>';

echo makeHTML::makeFooter();
// EOF

?>