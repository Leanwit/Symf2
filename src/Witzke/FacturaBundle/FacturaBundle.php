<?php

namespace Witzke\FacturaBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class FacturaBundle extends Bundle
{
    
     public function getParent()
    {
	return 'FOSUserBundle';
    }
}
