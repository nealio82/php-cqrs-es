Feature: EngineerRepair
  In order to satisfy the customer
  As an engineer
  I need to be able to repair a laptop

  Scenario: Diagnose Fault
    Given I have a repair job
    When I diagnose the fault
    Then I should have a diagnosis

  Scenario: Repair Fault
    Given I have a repair job
    And I have a diagnosis
    When I repair the fault
    Then the computer should be fixed