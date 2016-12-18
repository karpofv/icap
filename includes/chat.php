<?php
function update_sessions()
{
    $sid = session_id();
    $permiso = $_SESSION['usuario_login'];
    if($_SESSION['sitename_online'] == "1")
    {
      echo $permiso;
        mysql_query("UPDATE `sessions` SET `time` = '". time() ."' WHERE `sid` = '$sid'") or die(mysql_error());
    }
    else
    {
        $_SESSION['sitename_online'] = 1;
        ///mysql_query("INSERT INTO `sessions` SET `time` = '". time() ."', `sid` = '$sid', `usuario` = '$permiso'") or die(mysql_error());
        mysql_query("INSERT INTO sessions(time, sid, usuario) values('". time() ."', '$sid', '$permiso')") or die(mysql_error());
    }
}


function get_onlineusers()
{
    $min = time() - 301;
    mysql_query("DELETE FROM `sessions` WHERE `time` <= '$min'") or die(mysql_error());
    //$query = mysql_query("SELECT COUNT(sid) FROM `sessions`");
    //$num = mysql_fetch_row($query);
    return($num[0]);
}
?>