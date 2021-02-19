
<?php
    require_once('init.php');
    global $session;
     $error='';

        $urlContents=file_get_contents('php://input');
        $urlarray = json_decode($urlContents,true);
        $flag=0;

        if (!$urlarray['id'])
        {
            $error.='ID is required <br>';
            $flag=1;

        }
        if (strlen($urlarray['id'])!=9)
        {
            $error.='Invalid ID, must be 9 digits <br>';
            $flag=1;

        }
        else
        {
            $user=new User();
            $res=$user->find_if_exist($urlarray['id']);
            if(!$res)
            {
               $error='ID already in use';
               echo $error;
               exit;
            }
        }
        if(!$urlarray['firstName'])
        {
            $error.='First Name is required <br>';
            $flag=1;

        }
        if(!$urlarray['lastName'])
        {

            $error.='Last Name is required <br>';
            $flag=1;

        }

         if(!$urlarray['password'])
        {

            $error.='Password is required <br>';
            $flag=1;

        }
        if ($flag==0)
        {
            $id=$urlarray['id'];
            $firstName=$urlarray['firstName'];
            $lastName=$urlarray['lastName'];
            $password= md5($urlarray['password']);
            $address=$urlarray['address'];
            $membership=$urlarray['clubMembership'];
            if (!$membership)
            {
                 $membership=0 ;
            }
            $user=new User();
            $error=$user->add_user($id,$firstName,$lastName,$password,$address,$membership);
            if (!$error)
            {
                $error = 'Register Successfully';
            }
        }
        echo $error;
?>