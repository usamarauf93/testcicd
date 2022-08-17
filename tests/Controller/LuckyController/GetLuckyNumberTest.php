<?php 
namespace Test\Controller\LuckyNumberController;


class GetLuckyNumberTest extends \PHPUnit\Framework\TestCase
{

    public function providerTestMyLuck()
    {
        return [
            'Hello' => [
                'data' => 5
            ],
            // 'Hello1' => [
            //     'data' => 7
            // ]
        ];
    }
    /**
     * 
     * @dataProvider providerTestMyLuck
     */
    function testMyLuck($data){
        // $data1 =$this->client->request('GET', "/lucky/number");
        // $response = $this->getResponseAsArray();
        var_dump('heelo',$data);

    }
}