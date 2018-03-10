<?php
/**
 * Created by PhpStorm.
 * User: Tomasz Kotlarek (ZICHER)
 * Date: 07.03.2018
 * Time: 11:51
 */

namespace Zicher\MailMessageBundle\Tests\DependencyInjection;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Zicher\MailMessageBundle\DependencyInjection\ZicherMailMessageExtension;

/**
 * Class ZicherMailMessageExtensionTest
 * @package Zicher\MailMessageBundle\Tests\DependencyInjection
 */
class ZicherMailMessageExtensionTest extends TestCase
{
    /**
     * @var ContainerBuilder
     */
    protected static $container;

    /**
     *
     */
    public static function setupBeforeClass()
    {
        $container = new ContainerBuilder();

        $loader = new ZicherMailMessageExtension();
        $loader->load([], $container);

        $container->compile();

        self::$container = $container;
    }

    /**
     * @covers \Zicher\MailMessageBundle\DependencyInjection\ZicherMailMessageExtension::load()
     */
    public function testFactoryDefinition()
    {
        $this->assertTrue(self::$container->hasDefinition('zicher_mail_message.factory'));
    }
}