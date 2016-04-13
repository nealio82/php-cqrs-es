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
        $this->fault = new \Acme\Fault\Fault(new \Acme\Fault\FaultCode('V_110'), 'No video output');
        $this->diagnosis = new \Acme\Fault\Diagnosis("Faulty video card");
        $this->computer = new \Acme\Computer\Computer(new \Acme\Computer\SerialNumber('123456'), $this->fault);
    }

    /**
     * @Given I have a faulty computer
     */
    public function iHaveAFaultyComputer()
    {
        $this->computer = new \Acme\Computer\Computer(new \Acme\Computer\SerialNumber('123456'), $this->fault);
    }

    /**
     * @When I book a repair
     */
    public function iBookARepair()
    {
        $this->repairJob = new \Acme\Repair\RepairJob($this->computer);
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
        $this->repairJob = new \Acme\Repair\RepairJob(
            $this->computer
        );
    }

    /**
     * @When I diagnose the fault
     */
    public function iDiagnoseTheFault()
    {
        $this->fault->diagnose($this->diagnosis);
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
        $this->repairJob = new \Acme\Repair\RepairJob(
            $this->computer
        );
        $this->fault->diagnose($this->diagnosis);
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
