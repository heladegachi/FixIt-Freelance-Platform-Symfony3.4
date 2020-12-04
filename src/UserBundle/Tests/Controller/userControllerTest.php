<?php

namespace UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class userControllerTest extends WebTestCase
{
    public function testRed()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/red');
    }

}
