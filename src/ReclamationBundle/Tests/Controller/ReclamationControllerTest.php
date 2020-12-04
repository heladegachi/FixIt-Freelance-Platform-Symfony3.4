<?php

namespace ReclamationBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ReclamationControllerTest extends WebTestCase
{
    public function testAjouterrec()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/AjouterRec');
    }

}
