<?php

return array(

	'secret'  => getenv('NOCAPTCHA_SECRET') ?: '6LeqxfAZAAAAAAk5609X3URqwT-caoP9Ig8tuHox',
	'sitekey' => getenv('NOCAPTCHA_SITEKEY') ?: '6LeqxfAZAAAAACqwOMggVkhqE17naBWemWxGVdZs',

	'lang'    => app()->getLocale(),

);
