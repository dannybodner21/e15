<?php

class IndexPageCest {
    
    public function _before(AcceptanceTester $I) {
    }

    // Create new workout and save it
    public function createNewWorkout(AcceptanceTester $I) {

        // Refresh the databases
        $I->amOnPage('/test/refreshDatabase');

        // Login
        $I->amOnPage('/test/loginAs/1');
        $I->amOnPage('/');

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

    // Create random workout and save it
    public function createRandomWorkout(AcceptanceTester $I) {

        // Refresh the databases
        $I->amOnPage('/test/refreshDatabase');

        // Login
        $I->amOnPage('/test/loginAs/1');
        $I->amOnPage('/');

        // Double check login
        $I->see('Logout');

        // Generate random workout
        $I->click('[test=generateRandomWorkoutButton]');

        // Check for elements when the results show
        $I->see('Random Workout');

        // Save the workout
        $I->click('[test=saveWorkoutButton]');

        // Check if it worked based off of new workout ID
        $I->see('1');
    
    }

    // Try and submit a workout without a name and fail
    public function noNameInForm(AcceptanceTester $I) {

        // Refresh the databases
        $I->amOnPage('/test/refreshDatabase');

        // Login
        $I->amOnPage('/test/loginAs/1');
        $I->amOnPage('/');

        // Interact with form elements
        $I->checkOption('[test=mainFormChest]');
        $I->click('[test=generateButton]');

        // Check for elements when the results show
        $I->see('The name field is required.');
    }

    // Try to submit a workout without a body part and fail
    public function noBodyPartInForm(AcceptanceTester $I) {

        // Refresh the databases
        $I->amOnPage('/test/refreshDatabase');

        // Login
        $I->amOnPage('/test/loginAs/1');
        $I->amOnPage('/');

        // Interact with form elements
        $I->fillField('[test=mainFormName]', 'this will fail');
        $I->click('[test=generateButton]');

        // Check for elements when the results show
        $I->see('Atleast one body part is required.');
    }


}