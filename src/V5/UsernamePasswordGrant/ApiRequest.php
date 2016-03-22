<?php

namespace Reliv\AxosoftApi\V5\UsernamePasswordGrant;

use Reliv\AxosoftApi\Model\AbstractApiRequest;
use Reliv\AxosoftApi\Model\GenericApiError;

/**
 * Class ApiRequest
 *
 * ApiRequest
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
class ApiRequest extends AbstractApiRequest
{
    /**
     * @var string
     */
    protected $requestUrl = '/api/oauth2/token';

    /**
     * @var string
     */
    protected $requestMethod = 'GET';

    /**
     * @var array
     */
    protected $requestParameters = [
            'grant_type' => 'password',
            'scope' => 'read',
        ];

    /**
     * setUsername
     *
     * @param $value
     *
     * @return void
     */
    public function setUsername($value)
    {
        $this->requestParameters['username'] = (string)$value;
    }

    /**
     * setPassword
     *
     * @param $value
     *
     * @return void
     */
    public function setPassword($value)
    {
        $this->requestParameters['password'] = (string)$value;
    }

    /**
     * setClientId
     *
     * @param $value
     *
     * @return void
     */
    public function setClientId($value)
    {
        $this->requestParameters['client_id'] = (string)$value;
    }

    /**
     * setClientSecret
     *
     * @param $value
     *
     * @return void
     */
    public function setClientSecret($value)
    {
        $this->requestParameters['client_secret'] = (string)$value;
    }

    /**
     * setScope
     *
     * @param $value
     *
     * @return void
     */
    public function setScope($value)
    {
        $this->requestParameters['scope'] = (string)$value;
    }

    /**
     * getResponse
     *
     * @param $responseData
     *
     * @return \Reliv\AxosoftApi\Model\AbstractApiResponse
     */
    public function getResponse($responseData)
    {
        if (isset($responseData['error']) || isset($responseData['error_description'])) {
            return new GenericApiError($responseData);
        }

        return new ApiResponse($responseData);
    }
}
