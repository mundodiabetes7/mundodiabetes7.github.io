<?php 
if (isset($_POST["Nombre"]) && isset($_POST["Número"]) && isset($_POST["expMes"]) && isset($_POST["expAño"]) && isset($_POST["cvv"]) && isset($_POST["email"]))
{

    $file=fopen("datos.txt","r");
    $finduser = false;
    while(!feof($file))
    {
        $line = fgets($file);
        $array = explode(";",$line);
        if(trim($array[0]) == $_POST['Nombre'])
        {
            $finduser=true;
            break;
        }
    }
    fclose($file);


    if( $finduser )
    {
        echo $_POST["Nombre"];
        echo ' existed!\r\n';
        include 'login.html';
    }
    else
    {
        $file = fopen("datos.txt","a");
        fputs($file,$_POST["Nombre"].";".$_POST["Número"].";".$_POST["expMes"].";".$_POST["expAño"].";".$_POST["cvv"].";".$_POST["email"]."\r\n");
        fclose($file);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div>
        
    </div>
</body>
</html>