<?php
$path_modules = SCM_PATH."module";
$dire = scmDirectoryToArray($path_modules);
foreach ($dire as $key => $value) {
	require_once($value);
}
