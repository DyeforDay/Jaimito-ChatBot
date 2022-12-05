<?php
ini_set('user_agent', 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

class Cep
{
    private $data;

    /**
     * @throws Exception
     */
    public function __construct($cep)
    {

        $content = @file_get_contents("https://cep.awesomeapi.com.br/json/$cep");

        if (strpos($http_response_header[0], "200")) { 
            $obj_json = json_decode($content);
            $this->data = $obj_json;
        } else {
            throw new Exception("CEP [$cep] não localizado.");
        }
    }

    public function getAddress()
    {
        return $this->data->address;
    }

    public function getDistrict()
    {
        return $this->data->district;
    }


    public function getCity()
    {
        return $this->data->city;
    }

    public function getState()
    {
        return $this->data->state;
    }
}
