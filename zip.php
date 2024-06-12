<?php
$files = array("test.png","test.zip");

function delTree($dir) {
	$files = array_diff(scandir($dir), array('.','..'));
	foreach ($files as $file) {
		(is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
	}
	return rmdir($dir);
}

	// dest shouldn't have a trailing slash
function zip_flatten ( $zipfile, &$zipN, $dest='.' ) {
	$zip = new ZipArchive;
	if ( $zip->open( $zipfile ) ) {
		for ( $i=0; $i < $zip->numFiles; $i++ )	{
			$entry = $zip->getNameIndex($i);
			if ( substr( $entry, -1 ) == '/' ) {
            	// skip directories
				continue;
			}

			$fp = $zip->getStream( $entry );

				//print_r($fp);

			$fileinfo = pathinfo($entry);
			$search = array('.','/');
			$replace = array('','_');
			$new_filename2 = str_replace($search,$replace,$fileinfo['dirname'].($fileinfo['dirname']!= "."?'/':'')).$fileinfo['basename'];
			//if you dont even want to allow white-space set it to ''
			//$whiteSpace = '\s';
			$whiteSpace = '';
			$pattern = '/[^a-z.A-Z0-9'  . $whiteSpace . ']/u';
 			$new_filename2 = preg_replace($pattern, '', (string) $new_filename2);
			$ofp = fopen( $dest.'/'.$new_filename2, 'w' );

			if ( ! $fp ) {
				throw new Exception('Unable to extract the file.');
			}

			while ( ! feof( $fp ) ) {
				fwrite( $ofp, fread($fp, 8192) );
			}

			fclose($fp);
			fclose($ofp);
			$zipN->addFile($dest."/".$new_filename2,$new_filename2);
		}

		$zip->close();
	} else {
		return false;
	}

	return $zip;
}

function addFileToZip(&$zip,$file,$token) {
	if (is_file($file)) {
		$new_filename = substr($file,strrpos($file,'/') + 1);

		if (substr($file, -4) == ".zip") {

			zip_flatten($file, $zip, $token);

		} else {
			$zip->addFile($file,$new_filename);
		}
			//$session = $this->session->userdata();
			//$this->pages_model->set_download($session['idContact'],$new_filename);
	} else {
		$return['error'] = true;
	}
}


$return['error'] = FALSE;

if (!empty($files)) {
	$zip = new ZipArchive();

	$date = new DateTime();
	$micro_date = microtime();
	$date_array = explode(" ",$micro_date);
	$folder = $date->format("Ymd");
	$file = $date->format("his").str_replace('.','',$date_array[0]);

	if (!is_dir('zip/'.$folder)) {
		mkdir('zip/'.$folder);
	}

	$filename = 'zip/'.$folder.'/'.$file.'.zip';

	$result = $zip->open($filename, ZipArchive::CREATE);

	$token ='zip/'.$folder.'/'.$file;
	mkdir($token);

	if ($result) {

		if (is_array($files)) {
			foreach ($files as $file) {
				$t = addFileToZip($zip,$file,$token);
				if ($t['error']) {
					$return['error'] = true;
				}
			}
		} else {
			addFileToZip($zip,$files,$token);
			if ($t['error']) {
				$return['error'] = true;
			}
		}
		$zip->close();
		if(isset($token)){
			delTree( $token );
		}

				//$return['url'] = $this->basePath.$filename;
		$return['url'] = $filename;
	} else {
		$return['message'] = "Erreur lors de la création du fichier zip.";
		$return['error'] = true;
	}
} else {
	$return['message'] = "Pas de fichier à télécharger.";
	$return['error'] = true;
}

echo json_encode($return);
