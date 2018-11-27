<?php

checkParam($param, $type) {
	if ($type == 'numeric' && is_numeric($param)
		return (TRUE);
	return (FALSE);
}


?>
