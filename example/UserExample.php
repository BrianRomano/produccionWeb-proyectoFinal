<?php

    error_reporting(E_ALL);
    ini_set("display_errors", 1); 
    
    require_once('./../helpers/conecction.php');
    require_once('./../logic/UserBusiness.php');

    $userB = new UserBusiness($con);
    $user = $userB->getUser(1);

?>
    <pre><?php var_dump($user)?></pre>

<?php

    echo $user->getNombre();
    $datos = array( 'nombre'=>'Admin',
                    'email'=>'admin@admin.com',
                    'user'=>'admin',
                    'password'=>'123456',
                    'perfiles' => array(1));
    echo $userB->saveUser($datos);

    $datos = array( 'nombre'=>'Brian',
                    'email'=>'brian@brian.com',
                    'user'=>'brian',
                    'password'=>'123456',
                    'perfiles' => array(2));
    echo $userB->saveUser($datos);

    $datos = array( 'nombre'=>'Leonel',
                    'email'=>'leonel@leonel.com',
                    'user'=>'leonel',
                    'password'=>'123456',
                    'perfiles' => array(3));
    echo $userB->saveUser($datos);

    $datos = array( 'nombre'=>'Romano',
                    'email'=>'romano@romano.com',
                    'user'=>'romano',
                    'password'=>'123456',
                    'perfiles' => array(4));
    echo $userB->saveUser($datos);

?>
    <pre><?php var_dump($userB->getUsers())?></pre>