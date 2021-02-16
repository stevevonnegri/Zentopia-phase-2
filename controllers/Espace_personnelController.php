<?php

if(isset($_GET['deconnection'])) {
    session_destroy();
    echo ('<script>document.location.href="http://localhost/zentopia/index.php"</script>');
}

//$smarty->assign('active', 'espace_membre');
$smarty->display('templates/espace_personnel.tpl');
?>