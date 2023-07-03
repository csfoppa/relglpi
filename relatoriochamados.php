<?php


/*
error_reporting(E_ALL);
ini_set("display_errors", 1);
if (session_status() !== PHP_SESSION_ACTIVE) {//Verificar se a sessão não já está aberta.
  session_start();
//session_start(); }
 */
 

require_once('./src/PHPMailer.php');
require_once('./src/SMTP.php');
require_once('./src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$rex=$_POST["story"];

 if($rex!=""){

 
	 
	$data_relatorio=$_POST["data"];
	 $empresarelatorio=$_POST["empresa"];
	 
	 


// DEGUB VARIAVEL EMAIL

//echo "Email Click";
 

//$mail = new PHPMailer(true);
$mail = new PHPMailer(true);

try { 
	//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'gator4042.hostgator.com';
	$mail->SMTPAuth = true;
//	$mail->Username = 'helpdesk@virtualize-ti.com.br';
//	$mail->Password = 'XnZGZ93uoriFYK04zPHH';
	$mail->Username = 'relatorios@virtualize-ti.com.br';
	$mail->Password = '36qGR0hiY5ok';
	$mail->Port = 587;
	$mail->SMTPSecure = "tls"; // Tipo de comunicação segura  "tls" ou "ssl"

//	$mail->setFrom('helpdesk@virtualize-ti.com.br');
	$mail->setFrom('relatorios@virtualize-ti.com.br');
	$mail->addAddress('christian@virtualize-ti.com.br');
 

	$mail->CharSet = 'UTF-8';  
	$mail->isHTML(true);
	$mail->Subject = "[VIRTUALIZE-TI] - RAT ".$data_relatorio." ".$empresarelatorio."";
	$mail->Body =$rex;
//	$mail->AltBody = 'virtualize-ti';
//printf ( '.$relatorio_emails.');
 
	if($rex!=""){
			if($mail->send()) {
				 
				//echo 'Email enviado com sucesso';
			} else {
				 
				//echo 'Email nao enviado';
			}
	}
} catch (Exception $e) {
	
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
	 
}


	 
	 
	 
	 
 /*	$relatorio_emails="";
	 
	 unset($relatorio_emails );*/
	 
	 $rex="";
	 }else{
		 
		 //echo "ERRO";
	 }
	 
 

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">

table.sample {

	border-width: 1px;

	border-spacing: 0px;

	border-style: outset;

	border-color: black;

	border-collapse: separate;

	background-color: white;
	

	width:100%;

}

table.sample th {

	border-width: 1px;

	padding: 0px;

	border-style: inset;

	border-color: black;

	background-color: white;

	-moz-border-radius: ;

}

table.sample td {

	border-width: 1px;

	padding: 0px;

	border-style: inset;

	border-color: black;

	background-color: white;

	-moz-border-radius: ;

}

</style>


<title>Relatorio</title>
</head>

<body>





<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">

<table  border="1"  class="sample">

  <tr>

    <td><center>Selecione o cliente:</center></td>

    <td><center><select name="cliente" id="cliente">

  

<?php



$ultimo_dia=date("t");
$dia="01";//date("d");
$mes=date("m");
$ano=date("Y");
//printf( date("t"));
//printf( date("d"));
//printf( date("m"));
//printf( date("Y"));
 


$user = "csfoppa_helpdesk";

$password = "2XFDwFHFOxC5rIvNDR8f";

$database = "csfoppa_helpdesk";





		// O hostname deve ser sempre localhost

		$hostname = "localhost";

		

 

		// Conecta com o servidor de banco de dados

		$mysqli= new mysqli( $hostname, $user, $password ,$database ) or die( ' Erro na conexao ' );

		

		

		// Check connection

		if ($mysqli->connect_error) {

		die("Connection failed: " . $mysqli->connect_error);

		}

		$query="SELECT glpi_entities.id, glpi_entities.name FROM glpi_entities ORDER BY glpi_entities.id;";
		


 $result = $mysqli->query($query);

  while ($row = mysqli_fetch_array( $result )) { 

  

  if($_POST["cliente"]==$row[1])

	{ printf( "<option selected value=\"".$row[1]."\">".$row[1]."</option>"); }

  else

	{ printf( "<option value=\"".$row[1]."\">".$row[1]."</option>"); }

  }

   

  ?>

  </center>

 

  </select>

 

  </td>

    <td align="center"><p>Data inicial:</p></td>

    <td align="center"<p>
<?php  
	if(isset($_POST["data_inicial"])){
	       printf(" <input type=\"date\" name=\"data_inicial\" id=\"data_inicial\" value=\"".$_POST["data_inicial"]."\"/>");
	}else{		
		  printf(" <input type=\"date\" name=\"data_inicial\" id=\"data_inicial\" value=\"".$ano."-".$mes."-".$dia."\"/>");
	}
?>
      
<!--  <input type="date" name="data_final" id="data_final" value="<?php /* printf($_POST["data_final"]); */?>"  /> -->
    </p></td>

    <td align="center"<p>Data final:</p></td>

    <td align="center"<p>

<?php  
	if(isset($_POST["data_final"])){
	       printf(" <input type=\"date\" name=\"data_final\" id=\"data_final\" value=\"".$_POST["data_final"]."\"/>");
	}else{		
		  printf(" <input type=\"date\" name=\"data_final\" id=\"data_final\" value=\"".$ano."-".$mes."-".$ultimo_dia."\"/>");
	}
?>
     <!-- <input type="date" name="data_final" id="data_final" value="<?php /*printf($_POST["data_final"])*/ ;?>"  /> -->

    </p></td>

<!--      <td>Valor Hora</td>

     <td> 

      <input type="text" name="valor_hora" id="valor_hora" value="<?php /* printf($_POST["valor_hora"]); */?>" /></td> -->

    <td ><center><input type="submit" name="pesquisa" id="pesquisa" value="Pesquisa" /></center></td>

	

    </tr>

 

</table>
 
 
 
</form>
 

 
</body>
</html>


<?php


if(isset($_POST["data_inicial"])){
	
 //$relatorio_emails="";
	
	




	
	
$data_inicial=$_POST["data_inicial"];
$data_final=$_POST["data_final"];
$nome_empresa=$_POST["cliente"];
$valor_hora=$_POST["valor_hora"];

$sql="SELECT * FROM `".$database."`.`glpi_hora` WHERE `empresa_nome` = '".$nome_empresa."' ";


//printf($sql);

$result = mysqli_query($mysqli, $sql);
if (mysqli_num_rows($result) > 0) {   
  while($row = mysqli_fetch_assoc($result)) {
   	$valor_hora= $row["valor_hora"];
	$cliente_nome= $row["cliente_nome"];
	$cliente_email= $row["cliente_email"];
	$cliente_phone= $row["cliente_phone"];
  }
}


printf("<td><center><h1>Relatorio Gerado para o Cliente: </h1></center></td>

		<td><center><h1>".$nome_empresa."</h1></center></td>

    </tr>

");

$relatorio_emails =$relatorio_emails."<td><center><h1>Relatorio Gerado para o Cliente: </h1></center></td>

		<td><center><h1>".$nome_empresa."</h1></center></td>

    </tr>

";
printf("<hr />");
$relatorio_emails =$relatorio_emails."<hr />";




//echo $valor_hora ." ". $cliente_nome ." ". $cliente_email ." ". $cliente_phone ." ". $sql  ;

 if($_POST["cliente"]!="Virtualize-TI"){
	printf("<table border='0'>
	
		<tr>
	
			<td colspan=\"1\"></td><td colspan=\"2\"></td><td colspan=\"3\"></td><td colspan=\"4\"></td>
	
			<td colspan=\"5\" ><b>Faturar para:</b> </td>
	
			<td colspan=\"6\"></td><td colspan=\"7\"></td><td colspan=\"8\"></td><td colspan=\"9\"></td>
	
			<td colspan=\"10\"><br></td>
	
			<td colspan=\"11\"></td><td colspan=\"12\"></td><td colspan=\"13\"></td><td colspan=\"14\"></td>
	
			<td colspan=\"15\" > Nome: $cliente_nome<br>E-mail: $cliente_email<br>Telefone: $cliente_phone</td>
	
		</tr>");
	
	printf("</table>");
	
	printf("<hr />");
	
	$relatorio_emails =$relatorio_emails."<table border='0'>
	
		<tr>
	
			<td colspan=\"1\"></td><td colspan=\"2\"></td><td colspan=\"3\"></td><td colspan=\"4\"></td>
	
			<td colspan=\"5\" ><b>Faturar para:</b> </td>
	
			<td colspan=\"6\"></td><td colspan=\"7\"></td><td colspan=\"8\"></td><td colspan=\"9\"></td>
	
			<td colspan=\"10\"><br></td>
	
			<td colspan=\"11\"></td><td colspan=\"12\"></td><td colspan=\"13\"></td><td colspan=\"14\"></td>
	
			<td colspan=\"15\" > Nome: $cliente_nome<br>E-mail: $cliente_email<br>Telefone: $cliente_phone</td>
	
		</tr>
		</table>
		<hr />
		";
}




if($nome_empresa == "Virtualize-TI"){
			 
				
				  
				printf("<table  border=\"1\"  class=\"sample\">
				
						<tr>
			      	    <td><center>Empresa</center></td>
						<td><center>Total de chamados no periodo</center></td>
				
						<td><center>Tempo Total </center></td>
				
						<td><center>Valor Total </center></td> 
				
						</td> ");
						
						$relatorio_emails =$relatorio_emails."<table  border=\"1\"  class=\"sample\">
				
						<tr>
			      	    <td><center>Empresa</center></td>
						<td><center>Total de chamados no periodo</center></td>
				
						<td><center>Tempo Total </center></td>
				
						<td><center>Valor Total </center></td> 
				
						</td> ";
				//printf("</table>");
				
				} else{
						printf("<table  border=\"1\"  class=\"sample\">
						
							<tr>
							
							<!-- <td><center>Cliente</center></td>-->
							
							<td><center>Numero do Chamado</center></td>
							
							<td><center>Atividades no chamado</center></td>
							
							<td><center>Tempo Total do Chamado</center></td>
							
							<td><center>Titulo Chamado</center></td>
							
							<td><center>Data da Abertura</center></td>
							
							<td><center>Data de Fechamento</center></td>
							
							<!-- <td><center>Numero do Chamado</center></td>-->
							
							<td><center>Valor</center></td>
							
							</tr>
						
						");
						$relatorio_emails =$relatorio_emails."<table  border=\"1\"  class=\"sample\">
						
							<tr>
							
							<!--  <td><center>Cliente</center></td>-->
							
							<td><center>Numero do Chamado</center></td>
							
							<td><center>Atividades no chamado</center></td>
							
							<td><center>Tempo Total do Chamado</center></td>
							
							<td><center>Titulo Chamado</center></td>
							
							<td><center>Data da Abertura</center></td>
							
							<td><center>Data de Fechamento</center></td>
							
							<!-- <td><center>Numero do Chamado</center></td>-->
							
							<td><center>Valor</center></td>
							
							</tr>
						
						";
					}










 

 
if($nome_empresa == "Virtualize-TI"){
	
	$valor_total_super=0;
	$total_chamado_super=0;
	$total_temp_super=0;
			
			$tempo_chamado=0;
			
			$total_chamado=0;
			
			$total_temp=0;
			
			$valor_total=0;
	
	$sql_virtualiza="SELECT * FROM `".$database."`.`glpi_entities` WHERE `name` <> 'Virtualize-TI'";
	
	
	
	
		$resultado = $mysqli->query($sql_virtualiza);
	
	while($row = $resultado->fetch_row()){
		
		//printf($row[1]."<br/>");
		$cliente_virtualiza=$row[1];
		
		
		if($nome_empresa != null){
		
		  $clientFilter = "AND glpi_entities.name ='".$cliente_virtualiza."'";
		
		}



		$data_inicio = isset($data_inicial) && !empty($data_inicial) ? $data_inicial : null;
		
		$data_fim = isset($data_final) && !empty($data_final) ? $data_final : null;$dataFilter = "";
		
		if($data_inicio != null && $data_fim != null){
		
		  $dataFilter = "AND DATE(glpi_tickets.date)  BETWEEN DATE('$data_inicio') AND DATE('$data_fim')";
		
		}



		$query = "select
		
				glpi_entities.name as 'Cliente',
		
				glpi_tickets.id as 'Numero do Chamado',
		
				COUNT(glpi_tickettasks.id) as 'Numero de Atividades',
		
				SUM(glpi_tickettasks.actiontime) as 'Tempo Gasto',
		
				glpi_tickets.name as 'Titulo Chamado',
		
				LEFT(glpi_tickets.date,10) as 'Data da Abertura',
		
				LEFT(glpi_tickets.closedate,10) as 'Data de Fechamento',
		
				CONCAT('https://helpdesk.virtualize-ti.com.br/front/ticket.form.php?id=',glpi_tickets.id) as 'Link'
		
				, ROUND(SUM(((glpi_tickettasks.actiontime)/60)/60) * $valor_hora ,2)as 'Valor'
		
			FROM glpi_tickets
		
				inner join glpi_entities on glpi_tickets.entities_id = glpi_entities.id
		
				inner join glpi_tickettasks on glpi_tickettasks.tickets_id = glpi_tickets.id
		
			WHERE 1=1
		
			$dataFilter
		
			$clientFilter
		
			GROUP BY glpi_tickets.id
		
			ORDER BY glpi_tickets.id";
		


			//printf($query );
			
			$result = $mysqli->query($query);
			
			$result2 = $mysqli->query($query);
			
			
			
			
			
			

			
			
			
			$stats =  array();

			while($row = $result->fetch_row()){
			
			  $chamadoId = $row[1];
			
			  $stats[$chamadoId] += $row[3];
			
			  $stats['client_name'] = $row[0];
			
			  $stats['ticket_id'] = $row[1];
			
			  
			
			$result2 = $mysqli->query($query);
			
				while($rowx = $result2->fetch_row()){
			
			
			
					if($row[0]==$rowx[0]){
			
						$tempo_chamado=$tempo_chamado+$row[3];          
			
					}
			
				}
			
				
			
			  $total_temp=$total_temp+$row[3];
			
			  $secCount = $row[3];
			
							$hours = str_pad(floor($secCount / (60*60)), 2, '0', STR_PAD_LEFT);
			
							$minutes = str_pad(floor(($secCount - $hours*60*60)/60), 2, '0', STR_PAD_LEFT);
			
							$seconds = str_pad(floor($secCount - ($hours*60*60 + $minutes*60)), 2, '0', STR_PAD_LEFT);
			
			  
			
			  $dtInicio = implode("/",array_reverse(explode("-",$row[5])));
			
			  
			
			  $dtFechamento = implode("/",array_reverse(explode("-",$row[6])));
			
			
			
			
			
			$valor_total=$valor_total+$row[8];
			
			
			
			  if($dtFechamento==""){
			
						$dtFechamento='Chamado em aberto';          
			
					}
			
			  $total_chamado=$total_chamado+1;
			if($nome_empresa != "Virtualize-TI"){
					printf("
			
					<tr>
			
					    <td>".str_replace("Distribuidora","",$cliente_virtualiza)."</td>
			
						<!-- <td><center>".$row[1]."</center></td> -->
			
						<td><center><a href=\"".$row[7]."\">".$row[1]."</a></center></td>
			
						<td><center>".$row[2]."</center></td>
			
						<td><center> $hours:$minutes:$seconds </center></td>  
			
						<td>".$row[4]."</td>
			
						<td><center>".$dtInicio."</center></td>
			
						<td><center>".str_replace("Chamado em","",$dtFechamento)  ."</center></td>
			
						<td nowrap=\"nowrap\"><left>R$ ".number_format($row[8],2,',','.')."</left></td>
			
					</tr>");
					
					$relatorio_emails =$relatorio_emails."
			
					<tr>
			
					    <td>".str_replace("Distribuidora","",$cliente_virtualiza)."</td>
			
						<!-- <td><center>".$row[1]."</center></td> -->
			
						<td><center><a href=\"".$row[7]."\">".$row[1]."</a></center></td>
			
						<td><center>".$row[2]."</center></td>
			
						<td><center> $hours:$minutes:$seconds </center></td>  
			
						<td>".$row[4]."</td>
			
						<td><center>".$dtInicio."</center></td>
			
						<td><center>".str_replace("Chamado em","",$dtFechamento)  ."</center></td>
			
						<td nowrap=\"nowrap\"><left>R$ ".number_format($row[8],2,',','.')."</left></td>
			
					</tr>";
			}
			
			//	$tempo_chamado=0;
			
			
			
			}
			
			 
			
							 $hours = str_pad(floor($total_temp / (60*60)), 2, '0', STR_PAD_LEFT);
			
							$minutes = str_pad(floor(($total_temp - $hours*60*60)/60), 2, '0', STR_PAD_LEFT);
			
							$seconds = str_pad(floor($total_temp - ($hours*60*60 + $minutes*60)), 2, '0', STR_PAD_LEFT);
			
			 
			
			
		 
				if($nome_empresa == "Virtualize-TI"){
			 
				
				//printf("<br />");
			//	printf("<table  border=\"1\"  class=\"sample\">
				printf("
						<tr>
			      	    <td>Empresa: <b>".str_replace("Distribuidora","",$cliente_virtualiza)."</b></td>
						<td><center>Total de chamados no periodo: <b>".$total_chamado."</b></center></td>
				
						<td><center>Tempo Total: <b>$hours:$minutes:$seconds</b></center></td>
				
						<td>Valor Total : <b>R$ ".number_format($valor_total,2, ',','.')."</b></td>
				
						</td> ");
						
						$relatorio_emails =$relatorio_emails."
						<tr>
			      	    <td>Empresa: <b>".str_replace("Distribuidora","",$cliente_virtualiza)."</b></td>
						<td><center>Total de chamados no periodo: <b>".$total_chamado."</b></center></td>
				
						<td><center>Tempo Total: <b>$hours:$minutes:$seconds</b></center></td>
				
						<td>Valor Total : <b>R$ ".number_format($valor_total,2, ',','.')."</b></td>
				
						</td> ";
				
				
				} 
				$valor_total_super=$valor_total_super + $valor_total;
				$total_chamado_super=$total_chamado_super + $total_chamado;
				$total_temp_super=$total_temp_super + $total_temp;
				
				
				$valor_total=0;
				$total_chamado=0;
				$total_temp=0;
		
		}
	printf("</table>");
	
	
	$relatorio_emails =$relatorio_emails."</table>";
			
			
			
	 	
			
$hours = str_pad(floor($total_temp_super / (60*60)), 2, '0', STR_PAD_LEFT);
$minutes = str_pad(floor(($total_temp_super - $hours*60*60)/60), 2, '0', STR_PAD_LEFT);
$seconds = str_pad(floor($total_temp_super - ($hours*60*60 + $minutes*60)), 2, '0', STR_PAD_LEFT);
			 
			printf("<br />");
				printf("<table  border=\"1\"  class=\"sample\">
				
						<tr>
				
						<td><center>Total de chamados no periodo: <b>".$total_chamado_super."</b></center></td>
				
						<td><center>Tempo Total: <b>$hours:$minutes:$seconds</b></center></td>
				
						<td><center>Valor Total : <b>R$ ".number_format($valor_total_super,2, ',','.')."</b></center></td>
				
						</td> ");
				printf("</table>");
				
				$relatorio_emails =$relatorio_emails."<br />
				 <table  border=\"1\"  class=\"sample\">
				
						<tr>
				
						<td><center>Total de chamados no periodo: <b>".$total_chamado_super."</b></center></td>
				
						<td><center>Tempo Total: <b>$hours:$minutes:$seconds</b></center></td>
				
						<td><center>Valor Total : <b>R$ ".number_format($valor_total_super,2, ',','.')."</b></center></td>
				
						</td>
						</table> ";
				
	
	
	
	
	
	
	
	}else{
 

 

		if($nome_empresa != null){
		
		  $clientFilter = "AND glpi_entities.name ='".$nome_empresa."'";
		
		}



		$data_inicio = isset($data_inicial) && !empty($data_inicial) ? $data_inicial : null;
		
		$data_fim = isset($data_final) && !empty($data_final) ? $data_final : null;$dataFilter = "";
		
		if($data_inicio != null && $data_fim != null){
		
		  $dataFilter = "AND DATE(glpi_tickets.date)  BETWEEN DATE('$data_inicio') AND DATE('$data_fim')";
		
		}



		$query = "select
		
				glpi_entities.name as 'Cliente',
		
				glpi_tickets.id as 'Numero do Chamado',
		
				COUNT(glpi_tickettasks.id) as 'Numero de Atividades',
		
				SUM(glpi_tickettasks.actiontime) as 'Tempo Gasto',
		
				glpi_tickets.name as 'Titulo Chamado',
		
				LEFT(glpi_tickets.date,10) as 'Data da Abertura',
		
				LEFT(glpi_tickets.closedate,10) as 'Data de Fechamento',
		
				CONCAT('https://helpdesk.virtualize-ti.com.br/front/ticket.form.php?id=',glpi_tickets.id) as 'Link'
		
				, ROUND(SUM(((glpi_tickettasks.actiontime)/60)/60) * $valor_hora ,2)as 'Valor'
		
			FROM glpi_tickets
		
				inner join glpi_entities on glpi_tickets.entities_id = glpi_entities.id
		
				inner join glpi_tickettasks on glpi_tickettasks.tickets_id = glpi_tickets.id
		
			WHERE 1=1
		
			$dataFilter
		
			$clientFilter
		
			GROUP BY glpi_tickets.id
		
			ORDER BY glpi_tickets.id";
		


			//printf($query );
			
			$result = $mysqli->query($query);
			
			$result2 = $mysqli->query($query);
			
			
			
			
			
			
			$tempo_chamado=0;
			
			$total_chamado=0;
			
			$total_temp=0;
			
			$valor_total=0;
			
			
			
			$stats =  array();

			while($row = $result->fetch_row()){
			
			  $chamadoId = $row[1];
			
			  $stats[$chamadoId] += $row[3];
			
			  $stats['client_name'] = $row[0];
			
			  $stats['ticket_id'] = $row[1];
			
			  
			
			$result2 = $mysqli->query($query);
			
				while($rowx = $result2->fetch_row()){
			
			
			
					if($row[0]==$rowx[0]){
			
						$tempo_chamado=$tempo_chamado+$row[3];          
			
					}
			
				}
			
				
			
			  $total_temp=$total_temp+$row[3];
			
			  $secCount = $row[3];
			
							$hours = str_pad(floor($secCount / (60*60)), 2, '0', STR_PAD_LEFT);
			
							$minutes = str_pad(floor(($secCount - $hours*60*60)/60), 2, '0', STR_PAD_LEFT);
			
							$seconds = str_pad(floor($secCount - ($hours*60*60 + $minutes*60)), 2, '0', STR_PAD_LEFT);
			
			  
			
			  $dtInicio = implode("/",array_reverse(explode("-",$row[5])));
			
			  
			
			  $dtFechamento = implode("/",array_reverse(explode("-",$row[6])));
			
			
			
			
			
			$valor_total=$valor_total+$row[8];
			
			
			
			  if($dtFechamento==""){
			
						$dtFechamento='Chamado em aberto';          
			
					}
			
			  $total_chamado=$total_chamado+1;
			
					printf("
			
					<tr>
			
					  <!--  <td>".$row[0]."</td>
			
						<td><center>".$row[1]."</center></td>
						<td><center>".$row[0]."</center></td>-->
			
						<td><center><a href=\"".$row[7]."\">".$row[1]."</a></center></td>
			
						<td><center>".$row[2]."</center></td>
			
						<td><center> $hours:$minutes:$seconds </center></td>  
			
						<td>".$row[4]."</td>
			
						<td><center>".$dtInicio."</center></td>
			
						<td><center>".$dtFechamento."</center></td>
			
						<td><left>R$ ".number_format($row[8],2,',','.')."</left></td>
			
					</tr>");
			
			
			$relatorio_emails =$relatorio_emails."
			
					<tr>
			
					  <!--  <td>".$row[0]."</td>
			
						<td><center>".$row[1]."</center></td>
						<td><center>".$row[0]."</center></td> -->
			
						<td><center><a href=\"".$row[7]."\">".$row[1]."</a></center></td>
			
						<td><center>".$row[2]."</center></td>
			
						<td><center> $hours:$minutes:$seconds </center></td>  
			
						<td>".$row[4]."</td>
			
						<td><center>".$dtInicio."</center></td>
			
						<td><center>".$dtFechamento."</center></td>
			
						<td><left>R$ ".number_format($row[8],2,',','.')."</left></td>
			
					</tr>";
				$tempo_chamado=0;
			
			
			
			}
			
			 
			
							 $hours = str_pad(floor($total_temp / (60*60)), 2, '0', STR_PAD_LEFT);
			
							$minutes = str_pad(floor(($total_temp - $hours*60*60)/60), 2, '0', STR_PAD_LEFT);
			
							$seconds = str_pad(floor($total_temp - ($hours*60*60 + $minutes*60)), 2, '0', STR_PAD_LEFT);
			
			 
			$relatorio_emails =$relatorio_emails."</table>";
			printf("</table>");
			
			
			
			printf("<br />");
			
			
			
				printf("<table  border=\"1\"  class=\"sample\">
				
						<tr>
				
						<td><center>Total de chamados no periodo: <b>".$total_chamado."</b></center></td>
				
						<td><center>Tempo Total: <b>$hours:$minutes:$seconds</b></center></td>
				
						<td><center>Valor Total : <b>R$ ".number_format($valor_total,2, ',','.')."</b></center></td>
				
						</td> ");
				
				printf("</table>");
				
				
				$relatorio_emails =$relatorio_emails."
				 
				 <table  border=\"1\"  class=\"sample\">
				
						<tr>
				
						<td><center>Total de chamados no periodo: <b>".$total_chamado."</b></center></td>
				
						<td><center>Tempo Total: <b>$hours:$minutes:$seconds</b></center></td>
				
						<td><center>Valor Total : <b>R$ ".number_format($valor_total,2, ',','.')."</b></center></td>
				
						</td> 
						</table>";

}


//$_SESSION['relatorio_mail']=$relatorio_emails;

// DEBUG VARIAVEL EMAIL
/*
printf(" ---Inicio Variavel Email----");
echo$relatorio_emails;
printf(" ---Fim Variavel Email----");
*/





$relatorio_emails =$relatorio_emails."
<br/>

<br />

<hr />
<table>
	<tr>
		<td colspan=\"20\"><b>Dados para depósito no Sicredi:</b></td>
	</tr>
	<tr>
		<td colspan=\"20\">Banco Sicredi (748)</td>
	</tr>
	<tr>
		<td colspan=\"10\">Agência: 0116</td>
		<td colspan=\"10\">Conta Corrente: 00190-5</td>
	</tr>
	<tr>
		<td colspan=\"10\">CNPJ: 19.958.037/0001-55</td>
		<td colspan=\"10\">Razão Social: Virtualize Tecnologia da Informação LTDA</td>
	</tr>
	<tr>
		<td colspan=\"10\">Chave PIX: sicredi@virtualize-ti.com.br</td>
	</tr>
	<tr>
		<td colspan=\"20\"></td>
	</tr>
	<tr>
		<td colspan=\"20\"><b>Dados para depósito no Itau:</b></td>
	</tr>
	<tr>
		<td colspan=\"20\">Banco Itau (341)</td>
	</tr>
	<tr>
		<td colspan=\"10\">Agência: 0938</td>
		<td colspan=\"10\">Conta Corrente: 99535-4</td>
	</tr>
	<tr>
		<td colspan=\"10\">CNPJ: 19.958.037/0001-55</td>
		<td colspan=\"10\">Razão Social: Virtualize Tecnologia da Informação LTDA</td>
	</tr>
	<tr>
		<td colspan=\"10\">Chave PIX: itau@virtualize-ti.com.br</td>
	</tr>
</table>



<br />

<hr />

<table>

	<tr>

		<td colspan=\"1\"></td><td colspan=\"2\"></td><td colspan=\"3\"></td><td colspan=\"4\"></td>

		<td colspan=\"5\"> 	<b>Em caso de duvida entre em contato:</b> <br></td>

		<td colspan=\"6\"></td><td colspan=\"7\"></td><td colspan=\"8\"></td><td colspan=\"9\"></td>

		<td colspan=\"10\"> 	Telefone: <br> +55 51 4063.8334<br>

						 	Celular : <br>+55 51 99975.9921</td>

		<td colspan=\"11\">	Site: <br>https://virtualize-ti.com.br <br>

						 	E-mail: <br>christian@virtualize-ti.com.br</td>

	</tr>

</table>

<hr />";



} //fim
?>

<br/>

<br />

<hr />

<table>

	<tr>

		<td colspan="1"></td><td colspan="2"></td><td colspan="3"></td><td colspan="4"></td>

		<td colspan="5"> 	<b>Dados para deposito:</b> <br>

		<td colspan="6"></td><td colspan="7"></td><td colspan="8"></td><td colspan="9"></td>

	    <td colspan="10"> 	Banco Sicredi (748)<br></td>

		<td colspan="11"></td><td colspan="12"></td><td colspan="13"></td><td colspan="14"></td>

		<td colspan="15"> 	Agencia: 0116<br>

							Conta Corrente: 00190-5<br>

						 	CNPJ: 19.958.037/0001-55<br>
							
							Razão Social: Virtualize Tecnologia da Informação LTDA<br>
							
							Chave PIX: sicredi@virtualize-ti.com.br</td>

	</tr>

</table>

<br />

<hr />

<table>

	<tr>

		<td colspan="1"></td><td colspan="2"></td><td colspan="3"></td><td colspan="4"></td>

		<td colspan="5"> 	<b>Em caso de duvida entre em contato:</b> <br></td>

		<td colspan="6"></td><td colspan="7"></td><td colspan="8"></td><td colspan="9"></td>

		<td colspan="10"> 	Telefone: <br> +55 51 4063.8334<br>

						 	Celular : <br>+55 51 99975.9921</td>

		<td colspan="11">	Site: <br>https://virtualize-ti.com.br <br>

						 	E-mail: <br>christian@virtualize-ti.com.br</td>

	</tr>

</table>

<hr />

<form id="form2" name="form2" method="post" action="">


<table width="100%" border="0">
  <tr>
    <td align="right"><input type="submit" name="E-MAIL" id="E-MAIL" value="E-MAIL" /></td>
     <td align="right"><input type="text" style="display:none;"  name="empresa" id="empresa" value="<?php echo $nome_empresa;?>" /></td>
	 <td align="right"><input type="text" style="display:none;"   name="data" id="data" value="<?php  echo $mes."/".$ano?>" /></td>
	
<textarea id="story" style="display:none;" name="story"
        
 <?php echo $relatorio_emails;?>
</textarea>
	
	
	 
	
  </tr>
</table>
</form>




