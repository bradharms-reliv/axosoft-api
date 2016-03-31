<?php

namespace Reliv\AxosoftApi\Factory;

use GuzzleHttp\Client;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class GuzzleHttpClientFactory
 *
 * GuzzleHttpClientFactory
 *
 * PHP version 5
 *
 * @category  Reliv
 * @package   moduleNameHere
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2015 Reliv International
 * @license   License.txt New BSD License
 * @version   Release: <package_version>
 * @link      https://github.com/reliv
 */
class GuzzleHttpClientFactory implements FactoryInterface
{
    /**
     * createService
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return Client
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $configRoot = $serviceLocator->get('Config');

        $connectionConfig = $configRoot['Reliv\AxosoftApi']['Connection'];

        // @bc
        if (empty($connectionConfig['base_uri'])) {
            $connectionConfig['base_uri'] = $connectionConfig['base_url'];
        }

        return new Client(
            $connectionConfig
        );
    }
}
