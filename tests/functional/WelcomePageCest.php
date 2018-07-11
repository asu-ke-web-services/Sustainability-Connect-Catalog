<?php


class WelcomePageCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function visitHomePage(FunctionalTester $I)
    {
        $I->wantTo('view the welcome page');

        $I->amOnPage('/');
        $I->seeResponseCodeIs(200);
        $I->see('Laravel');
    }
}
