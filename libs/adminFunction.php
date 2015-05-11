<?php 
    function showAdminPage()
    {
        checkAdminLoggedIn($_SESSION);
        // echo 'aaaaaaaaaaaaaaaaaaa';
    }
    function checkAdminLoggedIn($session)
    {
        $app = Slim::getInstance();
        if( empty( $session['admin'] ) )
        {
           $app->redirect('../engLesson');exit;
        }
    }