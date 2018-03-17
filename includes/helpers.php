<?php 
	session_start();
	if(!isset($_SESSION['auth'])){
		$_SESSION['auth'] = 'off';
	} 
	function render($template, $data = array())
	{	
		$path = $_SERVER['DOCUMENT_ROOT']."/orthodox-icons-shop/html/".$template.".php";
		if (file_exists($path)){
			extract($data);
			require($path);
		}
	}

	$index = ($_SERVER["PHP_SELF"]);

	function destroy($var){
		unset($var);
	}
	function go_home(){
		header("Location:http//localhost/orthodox-icons-shop/");
	}

    function createTitleUrlSlug($title)
    {
        $nameSlug = trim(mb_strtolower($title, 'UTF-8'));
        $nameSlug = preg_replace('/-/', '', $nameSlug);
        $nameSlug = preg_replace('/\s+/', ' ', $nameSlug);
        $nameSlug = preg_replace('/\s+/', '-', $nameSlug);
        $nameSlug = preg_replace('/\?/', '', $nameSlug);
        $nameSlug = preg_replace('/(\d+).(\d+)/', '$1$2', $nameSlug);
        $nameSlug = preg_replace('/\,/', '', $nameSlug);
        $nameSlug = preg_replace('/\!/', '', $nameSlug);
        $nameSlug = preg_replace('/\:/', '', $nameSlug);
        $nameSlug = preg_replace('/\;/', '', $nameSlug);
        $nameSlug = preg_replace('/\(/', '', $nameSlug);
        $nameSlug = preg_replace('/\)/', '', $nameSlug);
        $nameSlug = preg_replace('/\"/', '', $nameSlug);
        $nameSlug = preg_replace('/\"/', '', $nameSlug);
        $nameSlug = preg_replace('/\-–-/', '-', $nameSlug);
        $nameSlug = preg_replace('/\&/', '', $nameSlug);

        return $nameSlug;
    }

    function formatSeoDescription($description) {
	    return preg_replace('/"/', '', $description);
    }
?>