<?php
/*
@File:config.php
@Author:Shailender Singh
@Date:28/02/2015
@Email:hi2shailender@gmail.com
@set up all defaults to run this programme, in this case we are only writing the arrays for the form.
*/
// default messages
//send this array to the class 
$aForm = array(
    'fname'=>array(
        'controlType'=>'input',
        'type'=>'text',
        'label'=>'First Name',
        'valid'=>'checkEmpty',
        'msg'=>'* Rqd'
        ),
    'lname'=>array(
        'controlType'=>'input',
        'type'=>'text',
        'label'=>'Last Name',
        'valid'=>'checkEmpty',
        'msg'=>'* Rqd'
        ),
    'phone'=>array(
        'controlType'=>'input',
        'type'=>'text',
        'label'=>'Mobile',
        'valid'=>'chPhone',
        'msg'=>'* Numbers, spaces, (), +, - only'
        ),
    'email'=>array(
        'controlType'=>'input',
        'type'=>'text',
        'label'=>'Email',
        'valid'=>'checkEmpty',
        'msg'=>'* Rqd'
        ),
    'category'=>array(
        'controlType'=>'select',
        'listValues'=>array(
                        1=>'First Category',
                        2=>'Second Category',
                        3=>'Third Category'
                        ),
        'label'=>'Category',
        'valid'=>'checkEmpty',
        'msg'=>'Select one'
        )
    );
$login=array(
	'username'=>array(
		'controlType'=>'input',
        'type'=>'text',
        'label'=>'Username',
        'valid'=>'checkEmpty',
        'msg'=>'* Rqd'
	),
	'password'=>array(
		'controlType'=>'input',
		'type'=>'password',
		'label'=>'Password',
		'valid'=>'checkempty',
		'msg'=>' * Rqd'
	)


);
/*$aRegisterForm = array(
    'fullname'=>array(
        'controlType'=>'input',
        'type'=>'text',
        'label'=>'Full Name',
        'valid'=>'',
        'msg'=>'* Rqd'
        ),
    'email'=>array(
        'controlType'=>'input',
        'type'=>'text',
        'label'=>'Email',
        'valid'=>'checkEmpty',
        'msg'=>'* Rqd'
        ),
    'password'=>array(
        'controlType'=>'input',
        'type'=>'password',
        'label'=>'Password',
        'valid'=>'checkEmpty',
        'msg'=>'* Rqd'
        ),
    'campus'=>array(
        'controlType'=>'select',
        'listValues'=>array(
                        1=>'Auckland',
                        2=>'Wellington',
                        3=>'Christchurch'
                        ),
        'label'=>'Campus',
        'valid'=>'checkEmpty',
        'msg'=>'Select one'
        ),
    'course'=>array(
        'controlType'=>'select',
        'listValues'=>array(
                        1=>'Web',
                        2=>'GD',
                        3=>'Animation',
                        4=>'Film'
                        ),
        'label'=>'Course',
        'valid'=>'checkEmpty',
        'msg'=>'Select one'
        )
    );

  EOF conf/config.php