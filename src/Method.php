<?php
/**
 * @package Wsdl2PhpGenerator
 */

namespace Wsdl2PhpGenerator;

/**
 * User: liuende
 * Date: 2018/4/13
 * Time: 上午11:00
 */
class Method implements \JsonSerializable
{
    /**
     * @var string The name of the request function
     */
    private $request;

    /**
     * @var array An array with Variables
     * @see Variable
     */
    private $paramsIn;

    /**
     * @var string A description of the response function
     */
    private $response;

    /**
     * @var array An array with Variables
     */
    private $paramsOut;

    /**
     * Method constructor.
     * @param string $request
     * @param $response
     */
    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response;
    }


    /**
     * @return string
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param string $request
     */
    public function setRequest(string $request)
    {
        $this->request = $request;
    }

    /**
     * @return array
     */
    public function getParamsIn()
    {
        return $this->paramsIn;
    }

    /**
     * @param Variable[] $paramsIn
     */
    public function setParamsIn(array $paramsIn)
    {
        foreach ($paramsIn as $param) {
            $this->paramsIn[]=$param->getName();
        }
    }

    /**
     * @return string
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param string $response
     */
    public function setResponse(string $response)
    {
        $this->response = $response;
    }

    /**
     * @return array
     */
    public function getParamsOut()
    {
        return $this->paramsOut;
    }

    /**
     * @param Variable[] $paramsOut
     */
    public function setParamsOut(array $paramsOut)
    {
        foreach ($paramsOut as $param) {
            $this->paramsOut[]=$param->getName();
        }
    }

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'request' => $this->getRequest(),
            'paramsIn' => $this->getParamsIn()??array(),
            'response' => $this->getResponse(),
            'paramsOut' => $this->getParamsOut()??array()
        ];
    }
}
