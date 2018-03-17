<?php 
	require('./includes/helpers.php');
    require('./model/seo_icon_details.php');
	#RENDER CONTROL
	if (@$_GET['shop'] == "Proceed to Shop" || @$_GET['shop'] == "Go to Shop"){
		render(
		    'templates/header',
            array(
                'title' => 'Orthodox Icon Shop - Online Orthodox Store',
                'description' => 'Here at our store you can find a big selection of the traditional Orthodox religious items in the ancient Russian, Greek and Byzantine styles. We have one of the most comprehensive Greek, Ukrainian and Russian wooden-base icons collection that includes artisant reproductions of famous prototype orthodox icons as well as custom made pre-order icons.',
                'image' => "http://".$_SERVER['HTTP_HOST']."/images/001-min.jpg",
                'url' => "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']
            )
        );
		render('shop', array('title' => 'Icon Shop'));
		render('templates/footer', array('copy' => 'All rights recived. Orthodox Icon Shop'));
		destroy($_GET['shop']);
	}
	else if (@$_SESSION['auth']== "on" && count($_GET)<1 && count($_POST)<1){
        header("Location:http://localhost/orthodox-icons-shop/index.php?shop=Proceed+to+Shop");
	}
	else if (count(@$_GET['q'])>0){
		render(
		    'templates/header',
            array(
                'title' => 'Orthodox Icon Shop - Online Orthodox Store - Search Results',
                'description' => 'Search Results - Here at our store you can find a big selection of the traditional Orthodox religious items in the ancient Russian, Greek and Byzantine styles. We have one of the most comprehensive Greek, Ukrainian and Russian wooden-base icons collection that includes artisant reproductions of famous prototype orthodox icons as well as custom made pre-order icons.',
                'image' => "http://".$_SERVER['HTTP_HOST']."/images/014-min.jpg",
                'url' => "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']
            )
        );
		render('search', array('title' => 'Icon Shop'));
		render('templates/footer', array('copy' => 'All rights recived. Orthodox Icon Shop'));
	}
	else if (@$_GET['open'] == "Show Icon Details" || @$_GET['open'] == "Back To Icon Details"){
		render(
		    'templates/header',
            array(
		        'title' => 'Orthodox Icon Shop - Buy Orthodox Icon - '.formatSeoDescription($seo_icon['name']),
                'description' => formatSeoDescription($seo_icon['description']),
                'image' => "http://".$_SERVER['HTTP_HOST']."/images/".$seo_icon['min_img'].".jpg",
                'url' => "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],
                'prices' => $prices
            )
        );
		render('open_icon');
		render('templates/footer', array('copy' => 'All rights recived. Orthodox Icon Shop'));
		destroy($_GET['open']);
	}
	else if (@$_GET['see_large'] == "See Icon in full size"){
		render(
		    'templates/header',
            array(
                'title' => 'Orthodox Icon Shop - Buy Orthodox Icon - '.formatSeoDescription($seo_icon['name']).' - Full Size',
                'description' => 'See Icon In Full Size - '.formatSeoDescription($seo_icon['description']),
                'image' => "http://".$_SERVER['HTTP_HOST']."/images/".$seo_icon['min_img'].".jpg",
                'url' => "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']
            )
        );
		render('see_large');
		render('templates/footer', array('copy' => 'All rights recived. Orthodox Icon Shop'));
		destroy($_GET['see_large']);
	}
	else if (@$_GET['log_in'] == "Log In / Sign Up"){
        render(
            'templates/header',
            array(
                'title' => 'Orthodox Icon Shop - Buy Orthodox Icon - Login or Register',
                'description' => 'Register or Login to our Orthodox Icon Shop in order to purchase high quality orthodox icons',
                'image' => "http://".$_SERVER['HTTP_HOST']."/images/014-min.jpg",
                'url' => "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']
            )
        );

		render('login', array('title' => 'Please log in to your existing account',
			'title_register' => 'If you are new to our website, please register in order to buy Icons'));
		render('templates/footer', array('copy' => 'All rights recived. Orthodox Icon Shop'));
		destroy($_GET['log_in']);
	}
    else if (@$_GET['log_in'] == "try"){
        render('login', array('title' => 'Please log in to your existing account',
            'title_register' => 'If you are new to our website, please register in order to buy Icons'));
        destroy($_GET['log_in']);
    }

	else if (@$_GET['web_master'] == "WebMaster_Zone_login"){
		render(
		    'templates/header',
            array(
                'title' => 'Orthodox Icon Shop',
                'description' => 'Orthodox Icon Shop',
                'image' => "http://".$_SERVER['HTTP_HOST']."/images/014-min.jpg",
                'url' => "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']
            )
        );
		render('webmaster_login', array('title' => 'Welcome to Web Master Area! Please Log In.'));
		render('templates/footer', array('copy' => 'All rights recived. Orthodox Icon Shop'));
		destroy($_GET['web_master']);
	}
	else if (@$_GET['web_master'] == "WebMaster Zone" || isset($_GET['icon_change']) || isset($_POST['icon_change'])){
		render(
		    'templates/header',
            array(
                'title' => 'Orthodox Icon Shop',
                'description' => 'Orthodox Icon Shop',
                'image' => "http://".$_SERVER['HTTP_HOST']."/images/014-min.jpg",
                'url' => "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']
            )
        );
		render('webmaster', array('title' => 'Welcome to Web Master Area! Please Log In.'));
		render('templates/footer', array('copy' => 'All rights recived. Orthodox Icon Shop'));
	}
	else if (@$_POST['logout'] == "Log Out" || @$_POST['logout'] == "Log Out From Web Master Zone"){
		render('logout', array('title' => 'You are loged out!'));
		render('templates/footer', array('copy' => 'All rights recived. Orthodox Icon Shop'));
		destroy($_POST['log_out']);
		go_home();
	}
	else if (@$_GET['shopping_list'] == 'Shopping List'){
        render(
            'templates/header',
            array(
                'title' => 'Orthodox Icon Shop - Shopping List',
                'description' => 'Orthodox Icon Shop - Shopping List',
                'image' => "http://".$_SERVER['HTTP_HOST']."/images/014-min.jpg",
                'url' => "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']
            )
        );
		render('shopping_list', array('title' => 'shopping list'));
		render('templates/footer', array('copy' => 'All rights recived. Orthodox Icon Shop'));
		destroy($_GET['shopping_list']);
	}
	else if (@$_GET['check_out'] == 'Check Out' || isset($_POST['check_out'])){
        render(
            'templates/header',
            array(
                'title' => 'Orthodox Icon Shop - Shopping List',
                'description' => 'Orthodox Icon Shop - Shopping List',
                'image' => "http://".$_SERVER['HTTP_HOST']."/images/014-min.jpg",
                'url' => "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']
            )
        );
		render('check_out', array('title' => 'shopping list'));
		render('templates/footer', array('copy' => 'All rights recived. Orthodox Icon Shop'));
		destroy($_GET['check_out']);
	}
	else if (@$_GET['contact'] == "Contact" || isset($_POST['send_message'])){
        render(
            'templates/header',
            array(
                'title' => 'Orthodox Icon Shop - Contact Me',
                'description' => 'When you desire to obtain an icon (or more), feel free to write an e-mail to tomadackovic@gmail.com for a brief but important dialogue regarding the saint(s) on the icon(s) you wish to order as well as quantities, size, shape, type or colors of your preferences.',
                'image' => "http://".$_SERVER['HTTP_HOST']."/images/037-min.jpg",
                'url' => "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']
            )
        );
		render('contact', array(
			'title' => 'Contact Me',
			'lead' => 'When you desire to obtain an icon (or more), feel free to write an e-mail to tomadackovic@gmail.com for a brief but important dialogue regarding the saint(s) on the icon(s) you wish to order as well as quantities, size, shape, type or colors of your preferences.'));
		render('templates/footer', array('copy' => 'All rights recived. Orthodox Icon Shop'));
		destroy($_GET['contact']);
	}
	else if (@$_GET['about'] == "About"){
		render(
		    'templates/header',
            array(
                'title' => 'Orthodox Icon Shop - Online Orthodox Store - About Us',
                'description' => 'Each icon is a handmade original. It is painted in traditional map of orthodox canons, as a part of Byzantine art. The icon is blessed by Serbian Orthodox Church through the parish priest. It is painted with egg tempera with ground pigments on the 23,75k gold-plated linden wooden board. Background (instead of gold) can be also in color, for example	blue, red, and others. Above saint is his name, which can be written on Serbian, English or any language you want. We are confident that you will find here a beautiful icon to support your Orthodox Christian prayer life.',
                'image' => "http://".$_SERVER['HTTP_HOST']."/images/040-min.jpg",
                'url' => "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']
            )
        );
		render('about', array(
			'title' => 'About Us',
			'lead' => 'St. Athanasius exclaimed, “God became man, so that man might become god” – god by grace, not by ‘nature’. Since the birth of Church, when Holy Spirit came upon the Apostles, God was glorified during Liturgical worship. Crescendo during holy Liturgy was – union with God through receiving Holy Communion by the believers. Along the historical way, as Gospels and Epistles were written, they were incorporated within the Liturgy, as well as its other visual aspect – holy icons.',
			'second' => 'For the Orthodox believers, for the Church, icon is a language that can express its doctrines and commandments as well as the written word. It is theology pressed in shapes and colors that the eye can see. For example, on icon there is no shade as there is no shade in Heaven where God Almighty Is the Light.',
			'third' => 'Icons we offer to you are made with prayers, by orthodox family where both parents as well as their children and in-laws, with adoration and humility, draw them, or to be more accurate – write them! Beside icons, this family paints churches and monasteries throughout Serbia. The icons of our Lord Jesus Christ, the icons of most holy Theotokos - the Mother of God, the icons of Male and Female holy Saints, the Festal icons - all are full of wonders, i.e. wonderful!',
			'fourth' => 'Each icon is a handmade original. It is painted in traditional map of orthodox canons, as a part of Byzantine art. The icon is blessed by Serbian Orthodox Church through the parish priest. It is painted with egg tempera with ground pigments on the 23,75k gold-plated linden wooden board. Background (instead of gold) can be also in color, for example blue, red, and others. Above saint is his name, which can be written on Serbian, English or any language you want. We are confident that you will find here a beautiful icon to support your Orthodox Christian prayer life.',
			'fifth' => 'When you desire to obtain an icon (or more), feel free to write an e-mail to tomadackovic@gmail.com for a brief but important dialogue regarding the saint(s) on the icon(s) you wish to order as well as quantities, size, shape, type or colors of your preferences.'));
		render('templates/footer', array('copy' => 'All rights recived. Orthodox Icon Shop'));
		destroy($_GET['about']);
	}
	else{
		render(
		    'templates/header',
            array(
                'title' => 'Orthodox Icon Shop',
                'description' => 'Icons we offer to you are made with prayers, by orthodox family where both parents as well as their children and in-laws, with adoration and humility, draw them, or to be more accurate – write them!',
                'image' => "http://".$_SERVER['HTTP_HOST']."/images/061-min.jpg",
                'url' => "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']
            )
        );
		render('home', array(
			'headline' => 'Orthodox Icon Shop - Online Orthodox Store',
			'lead' => 'Icons we offer to you are made with prayers, by orthodox family where both parents as well as their children and in-laws, with adoration and humility, draw them, or to be more accurate – write them! Beside icons, this family paints churches and monasteries throughout Serbia. The icons of our Lord Jesus Christ, the icons of most holy Theotokos - the Mother of God, the icons of Male and Female holy Saints, the Festal icons - all are full of wonders, i.e. wonderful!', 
			'second' => 'Each icon is a handmade original. It is painted in traditional map of orthodox canons, as a part of Byzantine art. The icon is blessed by Serbian Orthodox Church through the parish priest. It is painted with egg tempera with ground pigments on the 23,75k gold-plated linden wooden board. Background (instead of gold) can be also in color, for example	blue, red, and others. Above saint is his name, which can be written on Serbian, English or any language you want. We are confident that you will find here a beautiful icon to support your Orthodox Christian prayer life.', 
			'third' => 'When you desire to obtain an icon (or more), feel free to	write an e-mail to tomadackovic@gmail.com for a brief but important dialogue regarding the saint(s) on the icon(s) you wish	to order as well as quantities, size, shape, type or colors of your preferences.'));
		render('templates/footer', array('copy' => 'All rights recived. Orthodox Icon Shop'));
	}
?>