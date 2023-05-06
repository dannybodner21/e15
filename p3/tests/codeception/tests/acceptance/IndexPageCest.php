<?php

class IndexPageCest {
    
    public function _before(AcceptanceTester $I) {
    }

    // create new workout and save it
    public function createNewWorkout(AcceptanceTester $I) {

        // Login
        //$I->amOnPage('/test/login-as/1');
        // Act
        //$I->amOnPage('/');
        //$I->see('Logout');



        // Login flow -----
        $I->amOnPage('/login');
        $I->fillField('[name=email]', 'jill@harvard.edu');
        $I->fillField('[name=password]', 'asdfasdf');
        $I->click('button');
        $I->see('Logout');
        // ----------------

        // Interact with form elements
        $I->fillField('[test=mainFormName]', 'testing workout creation');
        $I->checkOption('[test=mainFormChest]');
        $I->checkOption('[test=mainFormTriceps]');
        $I->click('[test=generateButton]');

        // Check for elements when the results show
        $I->see('Main exercises:');

        // Generate new workout based on same parameters
        $I->click('[test=regenerateWorkoutButton]');

        // Check for elements when the results show
        $I->see('testing workout creation');

        // Save the workout
        $I->click('[test=saveWorkoutButton]');

        // Make sure the workout is in the table being displayed
        $I->see('testing workout creation');
        $I->see('Chest,Triceps');
    
    }
}