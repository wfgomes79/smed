<?php include 'includes/info.php'; ?>
<?php
header('Content-type: text/html; charset=UTF-8');
    $pdo = new PDO("mysql:host=$local; dbname=$banco; charset=utf8;", "$user", "$senha");
    $dados = $pdo->prepare("SELECT concat (codigo, ' - ', escola) escola /*apelido da querie*/ FROM $table");
	$dados->execute();
    echo json_encode($dados->fetchAll(PDO::FETCH_ASSOC));
	
	
/* */
?>

