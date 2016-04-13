Feature: ComputerRepair
  In order to have my computer repaired
  As a customer
  I need to be able to book it in for repair

  Scenario: Book computer for repair
    Given I have a faulty computer
    When I book a repair
    Then I should be given a job number