<?php
/*   print debug   */
function print_r_tree($data) {
    $out = print_r($data, true);
    $pattern = '/([ \t]*)(\[[^\]]+\][ \t]*\=\>[ \t]*[a-z0-9 \t_]+)\n[ \t]*\(/iU';
    $out = preg_replace_callback($pattern,
            function($m) {
                return $m[1].'<a href="javascript:toggleDisplay(\''.($id = substr(md5(rand().$m[0]), 0, 7)).'\');">'.$m[2].'</a><div id="'.$id.'" style="display: none;">';
            },
            $out);
    $out = preg_replace('/^\s*\)\s*$/m', '</div>', $out);
    $out = '<pre>' . $out . '</pre>';
    echo '<script language="Javascript">function toggleDisplay(id) { document.getElementById(id).style.display = (document.getElementById(id).style.display == "block") ? "none" : "block"; }</script>' . $out;
}

/*   log   */
$fp = fopen('test.log', 'a+');
fwrite($fp, '1');
fclose($fp);

/*   convert size to display nicely   */
function convert($size) {
    $unit = array('b', 'kb', 'mb', 'gb', 'tb', 'pb');
    return @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
}

/*   show ram usage | requirement   */
echo convert(memory_get_usage(true));

/*   list folder   */
$path = '.';
$dir = opendir($path);
$files = array();

while ($file = readdir($dir)) {
    array_push($files, $file);
}

closedir($dir);
echo '<pre>';
print_r($files);
echo '</pre>';
?>
