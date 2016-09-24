<?php
// $string = "комментарииврачакомментарииврачакоммент арииврачакомментарии врачакомментарии врачакомментарии врачакомментарии врачакомментарии врачакомментарии врачакомментарии врача";

// echo "---";
// echo strlen($string);
// echo "---";



// echo $newtext;	


// die("<br>-------");

	Header("Content-type: image/jpeg"); //указываем на тип передаваемых данных

	/*-----------POST DATA--------------*/
	$fio = $_POST['fio'];
	$bday = $_POST['bday'];
	$adress_poj = $_POST['adress_poj'];
	$uhod = $_POST['uhod'];
	$diagnoz = $_POST['diagnoz'];
	$gruppa_krovi = $_POST['gruppa_krovi'];
	$rezus = $_POST['rezus'];
	$ves = $_POST['ves'];
	$rost = $_POST['rost'];
	$tip_mutaccii = $_POST['tip_mutaccii'];
	$vrach = $_POST['vrach'];
	$lekarstva = $_POST['lekarstva'];
	$comments = $_POST['comments'];
	$comments = wordwrap($comments, 80, "\n");
	$diagnoz = wordwrap($diagnoz, 80, "\n");
	$adress_poj = wordwrap($adress_poj, 64, "\n");
	$lekarstva = wordwrap($lekarstva, 80, "\n");
	/*----------------------------------*/


// 38	
// \n

// echo $fio;
// echo $bday;
// echo $adress_poj;
// echo $uhod;
// echo $diagnoz;
// echo $gruppa_krovi;
// echo $rezus;
// echo $ves;
// echo $rost;
// echo $tip_mutaccii;
// echo $vrach;
// echo $lekarstva;
// echo $comments;


	$font_file='tahoma.ttf';//шрифт
	$img="RBpasport-2.jpg";//изображение
	$pic = ImageCreateFromjpeg($img); //открываем рисунок в формате JPEG
	$color=ImageColorAllocate($pic, 0, 0, 0); //получаем идентификатор цвета
	/* определяем место размещения текста по вертикали и горизонтали */
	// $top = 250; //отступ сверху
	// $left = 122; //отступ слева
	/* выводим текст на изображение */

	/* 1col */
	ImageTTFtext($pic, 26, 0, 30, 1820, $color, $font_file, $fio);
	ImageTTFtext($pic, 26, 0, 364, 1908, $color, $font_file, $bday);
	ImageTTFtext($pic, 26, 0, 30, 2020, $color, $font_file, $adress_poj);
	ImageTTFtext($pic, 26, 0, 30, 2218, $color, $font_file, $uhod);

	/* 2col */
	ImageTTFtext($pic, 26, 0, 1160, 2152, $color, $font_file, $gruppa_krovi);
	ImageTTFtext($pic, 26, 0, 1600, 2152, $color, $font_file, $rezus);
	ImageTTFtext($pic, 26, 0, 860, 1564, $color, $font_file, $diagnoz);
	ImageTTFtext($pic, 26, 0, 960, 2204, $color, $font_file, $ves);
	ImageTTFtext($pic, 26, 0, 1320, 2204, $color, $font_file, $rost);
	ImageTTFtext($pic, 26, 0, 1150, 2250, $color, $font_file, $tip_mutaccii);

	/* 3col */
	ImageTTFtext($pic, 26, 0, 1738, 1357, $color, $font_file, $vrach);
	ImageTTFtext($pic, 26, 0, 1738, 1584, $color, $font_file, $lekarstva);
	ImageTTFtext($pic, 26, 0, 1738, 2016, $color, $font_file, $comments);

	$image_url = "images_passport/".time().".jpg";
	Imagejpeg($pic,$image_url); //сохраняем рисунок в формате JPEG в каталог category/
	ImageDestroy($pic); //освобождаем память и закрываем изображение



	// echo "<b>fio:</b> " . $fio . " / ";
	// echo "<b>bday:</b> " . $bday . " / ";
	// echo "<b>adress_poj:</b> " . $adress_poj . " / ";
	// echo "<b>uhod:</b> " . $uhod . " / ";
	// echo "<b>diagnoz:</b> " . $diagnoz . " / ";
	// echo "<b>gruppa_krovi:</b> " . $gruppa_krovi . " / ";
	// echo "<b>rezus:</b> " . $rezus . " / ";
	// echo "<b>ves:</b> " . $ves . " / ";
	// echo "<b>rost:</b> " . $rost . " / ";
	// echo "<b>tip_mutaccii:</b> " . $tip_mutaccii . " / ";
	// echo "<b>vrach:</b> " . $vrach . " / ";
	// echo "<b>lekarstva:</b> " . $lekarstva . " / ";
	// echo "<b>comments:</b> " . $comments . " / ";

	// echo "<img src='" . $image_url . "' />";

	// echo "<a href='/test.pdf' class='link-to-print' target='blank'>Напечать</a>";

	$timest = time();

	include "/home/c/cb68433/public_html/pdf/demo.php";
	GeneratePDF($image_url,$timest);


	echo $timest;
?>