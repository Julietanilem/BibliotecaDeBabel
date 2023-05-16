<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
            $texto =(isset($_POST['buscar']) && $_POST["buscar"] != "")? $_POST['buscar'] : "No se especificó";
            $zonah = (isset($_POST['zonah']) && $_POST["zonah"] != "")? $_POST['zonah'] : "No se especificó";
            $modo = (isset($_POST['modo']) && $_POST["modo"] != "")? $_POST['modo'] : "No se especificó";
            if($texto=="No se especificó")
            {
                $texto="Cuando se quiere saber una cosa, lo mejor que se puede hacer es preguntarla.";
                $modo="oracion";
            }
            $limitepal=rand(300, 500);
            $longitudpal=rand(6,10); 
            $numpal=rand(0,$limitepal);
            $y=0;
   
            if($modo==="palabras")
            {
                $texto= explode(" ", $texto);
                $y=0;
                $lonarray= count($texto);
            
                $usados[0]=-1;
                
                $textoDesordenado[0]=-1;

                
                for($i=0;$i<$lonarray;$i++)    
                {
                    $pos=rand (0,$lonarray-1);  
                do
                {
                    $ocupado=0;
                    $y=0;
                    while($y<count($usados))
                    {
                
                        if($usados[$y]==$pos)
                        {
                            $ocupado=1;
                            $pos=rand (0,$lonarray-1);  
                            $y=0;
                        }
                        else
                        {
                            $y++;
                        }

                        
                    }
                }while($ocupado==1);
                    

                    if($ocupado==0)
                    {
                        $textoDesordenado[$pos]=$texto[$i];
                        array_push($usados, $pos);

                    }
                    
                }
            }
        
                echo "
                    <br/><br/><br/><br/>
                    <table border='5' align='center' width='750' heigth='50px'>
                        <thead>
                            <tr>
                                <th>Libro ";
                                for ($longpal=0;$longpal<$longitudpal; $longpal++)
                                {
                                        $numeroal=rand(65,90);
                                        if($numeroal % 2 != 0)
                                        {
                                            $numAleatorio=rand(48,57);
                                            $char=chr($numAleatorio);
                                        }
                                        else
                                            $char=chr($numeroal);
                                        echo $char;
                                } 
                                echo"</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                    ";
    
        
            $i=0;
            for($palabra=0; $palabra<$limitepal; $palabra++)
            {
            
                if($modo==="oracion" && $palabra==$numpal)
                {
                    
                    echo "<strong>$texto</strong> ";
                
                }  
                if ($modo==="orden" && $palabra==$numpal)
                {
                    $original=$texto;
                    $texto= strtolower($texto);
                    $texto= explode(" ", $texto);
                    $original= explode(" ", $original);
                    asort($texto);
                    foreach($texto as $llave=>$valor)
                    {
                        echo "<strong> $original[$llave] </strong>";
                    }

                }
                if ($modo==="palabras" && $palabra==$numpal && $i<count($textoDesordenado))
                {
                    
                    echo "<strong> $textoDesordenado[$i] </strong>";
                    $i++;
                    $numpal=rand($numpal+1, $limitepal-count($textoDesordenado));
                    $palabra-=count($textoDesordenado);
                
                }
            
                $longitudpal=rand(4,11);
                for ($longpal=0;$longpal<$longitudpal; $longpal++)
                {
                        $numeroal=rand(97,122);
                        $char=chr($numeroal);
                        echo "$char";
                }
                echo " ";    
            }
            echo "</td> </tr> </tbody> </table>";

            date_default_timezone_set($zonah);
            $zona = date_default_timezone_get();

            $fecha=date('d M Y');
            $segundos=date('h:i');
            echo '<br/>';
            echo "<strong>La fecha de consulta de este libro fue: $fecha a las $segundos en $zona </strong>";

            ?>
    </body>
</html>