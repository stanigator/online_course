## Animal is-a object (yes, sort of confusing) look at the extra credit
class Animal

end

## Dog is a type of Animal (Dog is a child class of Animal)
class Dog < Animal

  def initialize(name)
    ## this name belongs to Dog class instance
    @name = name
  end

end

## Cat is a type of Animal (Cat is a child class of Animal)
class Cat < Animal

  def initialize(name)
    ## this name belongs to Cat class instance
    @name = name
  end

end

## Person is its own class
class Person

  attr_accessor :pet

  def initialize(name)
    ## This name belongs to the Person class instance
    @name = name

    ## Person has-a pet of some kind
    @pet = nil
  end

end
## Employee is a type of Person (child of Person class)
class Employee < Person

  def initialize(name, salary)
    ## name belongs to the parent of Employee class, which is Person
    super(name)
    ## this member variable belongs to Employee class only
    @salary = salary
  end

end

## Fish is a base class
class Fish

end

## Salman is a child of Fish
class Salmon < Fish

end

## Halibut is a child of Fish
class Halibut < Fish

end

## rover is-a Dog
rover = Dog.new("Rover")

## satan is-a Cat
satan = Cat.new("Satan")

## mary is a person
mary = Person.new("Mary")

## mary's pet is satan
## Question: Does this copy a pet instance or use pointers?
mary.pet = satan

## Frank is an employee, which is a type of person
frank = Employee.new("Frank", 120000)

## Frank's pet is rover
frank.pet = rover

## flipper is a fish
flipper = Fish.new

## crouse is a salmon, which is a type of fish
crouse = Salmon.new

## harry is a Halibut, with is a type of fish
harry = Halibut.new
