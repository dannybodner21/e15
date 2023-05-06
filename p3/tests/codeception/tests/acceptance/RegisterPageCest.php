<?php

class RegisterPageCest
{
    public function _before(AcceptanceTester $I) {
    }

    // Make sure user can register
    public function userCanRegister(AcceptanceTester $I) {

        // Act
        $I->amOnPage('/register');

        // Assert the existence of certain text on the page
        $I->see('Register');

        // Interact with form elements
        $I->fillField('[name=name]', 'Test User');
        $I->fillField('[name=email]', 'test@harvard.edu');
        $I->fillField('[name=password]', 'asdfasdf');
        $I->fillField('[name=password_confirmation]', 'asdfasdf');
        //$I->click('button');

        // Assert expected results
        //$I->see('Welcome, Test User!');

        // Assert the existence of text within a specific element on the page
        //$I->see('Logout', 'nav');
    }
}