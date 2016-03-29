<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use PHPUnit_Framework_Assert AS PHPUnit;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }


    /**
     * @Given I have a faulty computer
     */
    public function iHaveAFaultyComputer()
    {
        throw new PendingException();
    }

    /**
     * @When I book a repair
     */
    public function iBookARepair()
    {
        throw new PendingException();
    }

    /**
     * @Then I should be given a job number
     */
    public function iShouldBeGivenAJobNumber()
    {
        throw new PendingException();
    }

    /**
     * @Given I have a repair job
     */
    public function iHaveARepairJob()
    {
        throw new PendingException();
    }

    /**
     * @When I diagnose the fault
     */
    public function iDiagnoseTheFault()
    {
        throw new PendingException();
    }

    /**
     * @Then I should have a diagnosis
     */
    public function iShouldHaveADiagnosis()
    {
        throw new PendingException();
    }

    /**
     * @Given I have a diagnosis
     */
    public function iHaveADiagnosis()
    {
        throw new PendingException();
    }

    /**
     * @When I repair the fault
     */
    public function iRepairTheFault()
    {
        throw new PendingException();
    }

    /**
     * @Then the computer should be fixed
     */
    public function theComputerShouldBeFixed()
    {
        throw new PendingException();
    }
}
