# Class 2 notes

## Run on local host
php -S localhost:3000

- whenever we have a new keyword we are calling the constructor

## Notes
```$this``` keyword references the current object of the class. It's only available within the class.

- echo 'hello $name\n' escape sequences and variable interpolation is possible
- echo "hello $name\n" output is almost exactly “as is”, with few exceptions

- phpinfo() will output configuration information. Modifying particular values in your php.ini file will change this output.

### Terminating Programs
A call to exit can be made to explicitly terminate programs.
For using a status code, keep the value >=0 and <= 254.
- Status code 255 is reserved for PHP
- Status code 0 means success (normal exit, non-error state)

## File I/O
### Working with files: outcomes
- Read files stored on disk
- Write content to files (overwriting and appending)
- Updating content within a file
- Deleting content within a file
- Parsing file contents (using implode, explode functions)
Be able to do Create, Read, Update, Delete (CRUD) operations on file
contents.

### Writing to files
- We can write to a file using `file_put_contents`, or `fopen`, `fwrite` and `fclose`:
- Note the file_put_contents docs: “This function is identical to calling fopen(), fwrite() and fclose()
successively to write data to a file.”

### Reading from files
- Reading files can be achieved using file_get_contents:
- This will read the entire file into a string. Similarly to writing files using the fopen approach, we can use fread to read them:
- Note that the second parameter for fread is the number of bytes to read. We can use the filesize function to get the size of the file we want to read.

## implode, explode
`implode`: join array elements with a string, return a string
`explode`: split a string by a string, return an array ← in Java, Python this is called “split”

## function call stack
- During the execution of an application the order in which functions are invoked must be kept track of.
- As a developer, understanding the function call stack is a critical part of being able to effectively
debug applications.

- A stack is a Last-In-First-Out (LIFO) data structure
-- Think of a stack of plates
- Two key operations:
-- Push: add a new element to the stack
-- Pop: remove the most recently added element

## Object Oriented Programing PHP
- Classes can be thought of as templates for creating objects
-- Classes describe the attributes and behaviour that the objects will have
- Interfaces allow us to create a contract: any class that implements XYZ interface will have to implement methods A, B, C
- Attribute access modifiers
-- `private`: only accessible within the class
-- `protected`: accessible within the current class and subclasses
-- `public`: accessible outside the class

## Intro to OOP in PHP: classes, creating objects
### Interfaces example: json serializable
The JsonSerializable interface can be implemented by any class that wants to
customize how it is represented when passed to json_encode(). The interface has one method which any class implementing the interface,
must provide, called jsonSerialize.

json_decode can be used to turn JSON into an associative array, or an stdClass (which is an empty class). Note that the second parameter for
json_decode is used to ask for an associative array to be returned.
json_encode json_decode

## Questions
1. What a class is, what an object is, and how to call methods on an
object
class - A class in PHP is a blueprint or template for creating objects. It defines the properties (variables) and behaviors (methods) that objects of the class will have. Classes are defined using the class keyword followed by the class name. 

object - An object in PHP is an instance of a class. It is a concrete realization of the blueprint defined by the class. You create objects using the new keyword followed by the class name, optionally passing arguments to the class constructor if it has one. For example:
`$myCar = new Car('Toyota', 'Corolla');`

How to call methods on objects
- Once you have an object, you can call methods defined in its class using the object operator ->. Here’s how you would call the start() method on the $myCar object:
`$myCar->start();`

2. When does the contructor get called?
In PHP, the constructor of a class is automatically called when an object of that class is instantiated using the new keyword. The constructor method is a special method defined within a class that is automatically invoked upon object creation. Here are the key points about constructors in PHP:

`Purpose:` Constructors are primarily used to initialize object properties or perform any setup tasks required when an object is created.

`Method Name:` In PHP, the constructor method is always named __construct(). This method is defined within the class like any other method, but it has a specific role when objects are instantiated.

`Automatic Invocation:` When you create an object of a class using new ClassName(), PHP automatically looks for a constructor method (__construct()) in that class and executes it.

3. The $this keyword $this keyword references the current object of the class. It's only available within the class.

4. What an interface is (in the context of OOP): needed for the lab
In PHP, an interface is a way to define a contract for classes. It specifies a set of methods that a class implementing the interface must implement. Interfaces allow you to specify what methods a class should have without providing the implementation details of those methods. This promotes code consistency, reusability, and facilitates polymorphism.

5. Basics of inheritance
Inheritance is a fundamental concept in object-oriented programming (OOP) where a class (known as a subclass or derived class) can inherit characteristics (methods and properties) from another class (known as a superclass or base class). Inheritance allows classes to be organized in a hierarchical structure, where subclasses can reuse and extend the functionality of the superclass.