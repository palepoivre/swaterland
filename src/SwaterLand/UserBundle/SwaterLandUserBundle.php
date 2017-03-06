<?php

namespace SwaterLand\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SwaterLandUserBundle extends Bundle
{
	public function getParent(){
		return 'FOSUserBundle';
	}
}
