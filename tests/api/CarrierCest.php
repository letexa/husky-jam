<?php 

class CarrierCest
{

    // tests
    public function tryToTest(ApiTester $I)
    {
        // Добавление перевозчика
        $I->sendPOST('/api/carrier/create', ['name' => 'Test carrier']);
        $I->seeInDatabase('carrier', ['name' => 'Test carrier']);
        
        // Удаление перевозчика
        $I->sendDELETE('/api/carrier/delete?id=1');
        $I->dontSeeInDatabase('carrier', ['name' => 'Test carrier']);
    }
}
