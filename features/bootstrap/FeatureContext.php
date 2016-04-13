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

    private $computer;

    private $repairJob;

    private $fault;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->fault = new \Acme\Fault(new \Acme\FaultCode('V_110'), 'No video output');
    }


    /**
     * @Given I have a faulty computer
     */
    public function iHaveAFaultyComputer()
    {
        $this->computer = new \Acme\Computer(new \Acme\SerialNumber('123456'), $this->fault);
    }

    /**
     * @When I book a repair
     */
    public function iBookARepair()
    {
        $this->repairJob = new \Acme\RepairJob($this->computer);
    }

    /**
     * @Then I should be given a job number
     */
    public function iShouldBeGivenAJobNumber()
    {
        PHPUnit::assertNotNull($this->repairJob->jobNumber());
    }

    /**
     * @Given I have a repair job
     */
    public function iHaveARepairJob()
    {
        $this->repairJob = new \Acme\RepairJob(
            new \Acme\Computer(new \Acme\SerialNumber('123456'), new \Acme\Fault(new \Acme\FaultCode('V_110'), 'No video output'))
        );
    }

    /**
     * @When I diagnose the fault
     */
    public function iDiagnoseTheFault()
    {
        $this->fault->diagnose(new \Acme\Diagnosis("Faulty video card"));
    }

    /**
     * @Then the fault should be diagnosed
     */
    public function theFaultShouldBeDiagnosed()
    {
        PHPUnit::assertTrue($this->fault->diagnosed());
    }

    /**
     * @Given I have a diagnosed fault
     */
    public function iHaveADiagnosedFault()
    {
        $this->repairJob = new \Acme\RepairJob(
            new \Acme\Computer(new \Acme\SerialNumber('123456'), new \Acme\Fault(new \Acme\FaultCode('V_110'), 'No video output'))
        );
        $this->fault->diagnose(new \Acme\Diagnosis("Faulty video card"));
    }

    /**
     * @When I repair the fault
     */
    public function iRepairTheFault()
    {
        $this->fault->repair();
    }

    /**
     * @Then the computer should not be faulty
     */
    public function theComputerShouldNotBeFaulty()
    {
        PHPUnit::assertFalse($this->computer->isFaulty());
    }
}
