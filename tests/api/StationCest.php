<?php 

class StationCest
{

    // tests
    public function tryToTest(ApiTester $I)
    {
        // Добавление станции
        $I->sendPOST('/api/station/create', ['name' => 'Test station']);
        $I->seeInDatabase('station', ['name' => 'Test station']);
        
        // Удаление станции
        $I->sendDELETE('/api/station/delete?id=1');
        $I->dontSeeInDatabase('station', ['name' => 'Test station']);
    }
}
