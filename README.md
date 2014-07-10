# Unofficial Acumulus PHP SDK
Hey, this is still a work in progress. Please don't use this yet in production.

Official Acumulus documentation: [https://apidoc.sielsystems.nl/]

## Installation

## Configuration
All of the provider classes take a config array as parameter. 
```
    $config['contractcode'] = 123456;
    $config['username'] = "xxxxxxxxx";
    $config['password'] = "xxxxxxxxx";
```
You could put these variables in a specific config file.

## Usage
### Request
The calls in the API can be called via specific classes corresponding to the categories on the official API docs. 
To start, create a new instance of the provider class you need.
```
    $client = new \Siegerhansma\AcumulusPhp\Providers\ContactsProvider($config);
```
After that, all the calls in that class will be available via the $client variable. 
```
    $client->getContactDetails(14036242)->sendRequest();
```
When the method is called, you can chain the sendRequest method to that. This method actually sends the request to the Acumulus API. The same principle stand for the other provider classes.

### Response



## TODO
A lot still to do, here's what:
* Write more tests
* Make documentation
* Support [Picklists](https://apidoc.sielsystems.nl/acumulus-api/picklists)

Again, **please don't use this in production yet!**

If you have any questions or feedback, leave an issue.
