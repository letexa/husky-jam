<?php 

class ScheduleCest
{

    // tests
    public function tryToTest(ApiTester $I)
    {
        $I->sendPOST('/api/carrier/create', ['name' => 'Test carrier']);
        $I->sendPOST('/api/station/create', ['name' => 'Test station']);
        $I->sendPOST('/api/station/create', ['name' => 'Test station 2']);
        
        // Добавление
        $I->sendPOST('/api/schedule/create', [
            'departure_id' => 1,
            'departure_time' => '09:00 PM',
            'arrival_id' => 2,
            'arrival_time' => '10:00 PM',
            'travel_time' => 60,
            'cost' => 200,
            'carrier_id' => 1,
            'days' => 'a:2:{i:0;s:1:"0";i:1;s:1:"1";}'
        ]);
        $I->seeInDatabase('schedule', ['cost' => 200]);
        
        // Редактирование
        $I->sendPATCH('/api/schedule/update?id=1', [
            'departure_id' => 1,
            'departure_time' => '09:00 PM',
            'arrival_id' => 1,
            'arrival_time' => '10:00 PM',
            'travel_time' => 60,
            'cost' => 300,
            'carrier_id' => 1,
            'days' => 'a:2:{i:0;s:1:"0";i:1;s:1:"1";}'
        ]);
        $I->seeInDatabase('schedule', ['cost' => 300]);
        
        // Удаление
        $I->sendDELETE('/api/schedule/delete?id=1');
        $I->dontSeeInDatabase('schedule', ['id' => 1]);
    }
}
