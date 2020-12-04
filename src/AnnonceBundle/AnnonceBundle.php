<?php

namespace AnnonceBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AnnonceBundle extends Bundle
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new FOS\UserBundle\FOSUserBundle(),
            // ...
        );
    }

}
