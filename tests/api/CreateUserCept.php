<?php
$I = new ApiTester($scenario);
$I->wantTo('create a user via API');
$I->amHttpAuthenticated('service_user', '123456');
$I->amHttpAuthenticated('service_user', '12sdd3456');
$I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
$I->sendPOST('/HandsUp');


