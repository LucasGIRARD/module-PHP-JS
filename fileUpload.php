<?php

function filenameHasWrongChar ($filename, $rule = "`^[-0-9A-Z]+$`i") {
	return (bool) ((preg_match($rule, $filename)) ? false : true);
}

function filenameIsTooLong ($filename, int $maxChar = 255) {
	return (bool) ((mb_strlen($filename, "UTF-8") > $maxChar) ? true : false);
}

function generateMime(bool $array = false){

	$s=array();
	foreach(@explode("\n",@file_get_contents('http://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types'))as $x) {
		if(isset($x[0])&&$x[0]!=='#'&&preg_match_all('#([^\s]+)#',$x,$out)&&isset($out[1])&&($c=count($out[1]))>1) {
			$s[$out[1][0]]['mime']=$out[1][0];
			for($i=1;$i<$c;$i++) {
				$s[$out[1][0]]['ext'][]=$out[1][$i];
			}
		}

	}

	if (!$array) {
		if (@sort($s)) {
			$l="";
			foreach ($s as $value) {
				$l.= $value['mime'].":".implode(':', $value['ext'])."\r\n";
			}
			$fp = fopen('mime.txt', 'w+');
			fwrite($fp, $l);
			fclose($fp);
		} else {
			$return = false;
		}
	} else {
		$return = (@sort($s) ? $s : false);
	}

	return $return;
}

function getMimeArray($filpath = "mime.txt") {
	$return = array();
	$fp=fopen($filpath,"r");
	while($line=fgets($fp)) {
		$t = explode(":", $line);
		for ($i=1; $i <= count($t) ; $i++) {
			$return[$t[$i]] = $t[0];
		}
	}
	fclose($fp);
	return $return;
}

function fileHasWrongMimeExtension ($filpath, $extension, array $mimeAllowed) {

	$finfo = new finfo(FILEINFO_MIME_TYPE);
	$mime = array_search($finfo->file($filpath), $mimeAllowed, true);
	return (bool) ($mime == false || $extension != $mime ? false : true);
}

function fileIsTooBig ($filpath, int $maxSize = 1000000 * 10) {
	return (bool) ((filesize($filpath) > $maxSize) ? true : false);
}

function uploadFiles (&$file, $uploaddir, $newFilename, $mimeAllowed = array(), $rule = "`^[-0-9A-Z]+$`i", $maxChar = 255, $maxSize = 1000000 * 10) {
	$return['error'] = false;

	if (!isset($file['error']) || $file['error'] == 0) {

		if (!is_uploaded_file($file['tmp_name'])) {
			$return['error'] = true;
			$return['message'] = "Une erreur lors de téléchargement du fichier " . $file['name'] . " s'est produit.";
		}

		if (empty($newFilename)) {
			$newFilename = $file['name'];
		}

		if (filenameHasWrongChar($newFilename, $rule)) {
			$return['error'] = true;
			$return['message'] = "Le nom du fichier " . $file['name'] . " contien 1 ou plusieurs caractère(s) interdit.";
		}

		if (filenameIsTooLong($file['tmp_name'], $maxChar)) {
			$return['error'] = true;
			$return['message'] = "Le nom du fichier " . $file['name'] . " est trop long.";
		}

		if (fileIsTooBig($file['tmp_name'], $maxSize)) {
			$return['error'] = true;
			$return['message'] = "Le fichier " . $file['name'] . " est trop volumineux.";
		}

		$extension = strrchr($file['name'], '.');
		if ($mimeAllowed == NULL) {
			$mimeAllowed = getMimeArray();
		}

		if (fileHasWrongMimeExtension($file['tmp_name'], $extension, $mimeAllowed)) {
			$return['error'] = true;
			$return['message'] = "L'extension du fichier n'est pas autorisé";
		}

		if ($return['error'] == false) {
			$path = $uploaddir . $newFilename . $extension;

			if (!move_uploaded_file($file['tmp_name'], $path)) {
				$return['error'] = true;
				$return['message'] = "Impossible de copier le fichier dans " . $uploaddir;
			} else {
				$return['message'] = "Le fichier " . $newFilename . "  a bien été téléchargé";
			}
		}

	} else {
		$return['error'] = true;
		$messageErreurPHP = array("",
			"Le fichier téléchargé excède la taille authorisé par le serveur. <!--(php.ini => upload_max_filesize) -->",
			"Le fichier téléchargé excède la taille authorisé par le formulaire. <!--(HTML => MAX_FILE_SIZE) -->",
			"Le fichier n'a été que partiellement téléchargé. <!-- (max_execution_time) -->",
			"Aucun fichier n'a été téléchargé.",
			"",
			"Le fichier n'a pas été téléchargé. <!--(serveur => dossier temporaire) -->",
			"Le fichier n'a pas été téléchargé. <!--(serveur => droit d'écriture) -->",
			"Le fichier n'a pas été téléchargé. <!--(serveur => extension PHP -->");
		$return['message'] = $messageErreurPHP[$file['error']];
	}
	return $return;
}
?>