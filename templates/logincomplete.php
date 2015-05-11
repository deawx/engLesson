<?php 
echo 'login complete';
    if(empty($_SESSION['loginUser']))
    {
        // $this->redirect('/');
    }
?>
<a href="logout">logout</a>
   
    