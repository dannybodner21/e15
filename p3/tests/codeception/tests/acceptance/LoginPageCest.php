<?php

class LoginPageCest
{
    /**
     * Any code you put in this method will be executed before each test
     */
    public function _before(AcceptanceTester $I) {
    }

    /**
     *
     */
    public function userCanLogIn(AcceptanceTester $I) {
        
        // Act
        $I->amOnPage('/login');

        // Assert the existence of certain text on the page
        $I->see('Login');

        // Assert the existence of a certain element on the page
        $I->seeElement('#email');

        // Interact with form elements
        $I->fillField('[name=email]', 'jill@harvard.edu');
        $I->fillField('[name=password]', 'asdfasdf');
        $I->click('button');

        // Assert expected results
        $I->see('Welcome, Jill Harvard');

        // Assert the existence of text within a specific element on the page
        $I->see('Logout', 'nav');

        // Logout
        $I->click('[test=logoutButton]');

        // Check for login button
        $I->see('Login');
    }
}