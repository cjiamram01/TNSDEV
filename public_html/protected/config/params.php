<?php

// this contains the application parameters that can be maintained via GUI
// How to use
// Yii::app()->params['title']
// Yii::app()->params['contact']['address']

return array(
	'title'=>'Vthai Property',
	'description'=>'ฝากซื้อฝากขายอสังหาริมทรัพย์ฟรี',
	'contact' => array(
		'address' => '737 ถนน กีฬากลาง ต.ในเมือง อ.เมือง จ.นครราชสีมา 30000',
		'mobile' => '083-465-4321',
		'phone' => '044-270-200',
		'email' => 'sales@koratrealty.com',
		),
	// 'facebook' => array(
	// 	'appId' => '656242697731966',
	// ),
	'social' => array(
		'facebook' => 'https://www.facebook.com/viriyah',
		'twitter' => 'https://twitter.com/igammy',
		'gplus' => 'https://plus.google.com/115436564425825044697/posts',
		'rss' => '#',
		'instagram'=>'http://instagram.com/igammy',
		'youtube'=>'http://youtube.com/user/Gamezxz',
		'dropbox'=>'https://www.dropbox.com/sh/p66hfoyv46rma4i/Vf58394KJA',
	),
	'blog' => array(
		'postsPerPage'=>10,
	),
	'shop' => array(
		'postsPerPage'=>6,
	),
	'theme' => array(
		'color'=>'body-blue',
	),
);
