<?php
$min=date("i", strtotime("+2 minutes"));
$hour=date("i");
header("Location:form.php?min=$min&hour=$hour");
?>
