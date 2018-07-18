# CREDIT BUREAU MALAYSIA - CBM API Package

This lLibrary allows to query the CBM - CREDIT BUREAU MALAYSIA - B2B API for registered users. 

You need the access details that were provided to you to make any calls to the API.
For exact parameters in the data array/XML, refer to your offline documentation.

If you do not know what all this is about, then you probably do not need or want this library.

# Configuration

## .env file

Configuration via the .env file currently allows the following variables to be set:

- CBM\_URL='http://api.endpoint/url/'
- CBM\_USERNAME=demouser 
- CBM\_PASSWORD=demoPassword

## Available functions

```php
CBM::generateXMLFromArray($data)
```
This function takes an array of options for the CBM API and generates the XML code
that can be submitted via the API Call. Example:
```php
// This is for Commercial Format
      [
       'SystemID'          =>  'SCBS',
       'Service'           =>  'My Company Name',
       'ReportType'        =>  'CCR-II',
       'MemberID'          =>  '1234567',
       'UserID'            =>  '1234567',
       'ReqNo'             =>  '',
       'SequenceNo'        =>  '001',
       'ReqDate'           =>  '05/04/2018',
       'PurposeStdCode'    => 'CREREV',
       'CostCenterStdCode' => '',
       'ConsentFlag'       => '',
       'Subject'           => [
                                'RegNo'                   => 'X1234',
                                'RegName'                 => 'ABC Sdn Bhd',
                                'DateBR'                  => '11/2/1988',
                                'ConstitutionTypeStdCode' => '24',
                                'BusinessCouCodeStdCode'  => '',
                                'BusinessStaCodeStdCode'  => '',
                                'EntityCode'              => '4130740',
                                'TradeEntityCode'         => ''
                             ]
      ]
      
// This is for Consumer Format
      [
       'SystemID'          =>  'SCBS',
       'Service'           =>  'SMEDTLRPTS',
       'ReportType'        =>  'CCR-II',
       'MemberID'          =>  '1234567',
       'UserID'            =>  '1234567',
       'ReqNo'             =>  '',
       'SequenceNo'        =>  '001',
       'ReqDate'           =>  '05/04/2018',
       'PurposeStdCode'    => 'CREREV',
       'CostCenterStdCode' => '',
       'ConsentFlag'       => '',
       'Subject'           => [
                                'IdNo1'                   => 'IC_NO',
                                'IdNo2'                   => 'OLD_IC/PASSPORT_NO',
                                'Name'                    => 'ABU BAKAR',
                                'Dob'                     => '31/12/1973',
                                'ConstitutionTypeStdCode' => '011',
                                'NationalityStdCode'      => '',
                                'EntityCode'              => '',
                                'TradeEntityCode'         => '',
                                'Email'                   => '',
                                'MobileNo'                => '',
                             ]
      ]

``` 

will generate
**// This is for Commercial Format**
```xml
   <?xml version="1.0"?>
   <Request>
	<SystemID>SCBS</SystemID>
	<Service>SMEDTLRPTS</Service>
	<ReportType>CRR-II</ReportType>
	<MemberID>1234567</MemberID>
	<UserID>1234567</UserID>
	<ReqNo/>
	<SequenceNo>001</SequenceNo>
	<ReqDate>05/04/2018</ReqDate>
	<PurposeStdCode>CREREV</PurposeStdCode>
	<CostCenterStdCode/>
	<ConsentFlag/>
	   <Subject>
		   <RegNo>X1234</RegNo>
		   <RegName>ABC Sdn Bhd</RegName>
		   <DateBR>11/2/1988</DateBR>
		   <ConstitutionTypeStdCode>24</ConstitutionTypeStdCode>
		   <BusinessCouCodeStdCode/>
		    <BusinessStaCodeStdCode/>
            <EntityCode>4130740</EntityCode>
		<TradeEntityCode/>
	   </Subject>
    </Request>
```
**// This is for Consumer Format**
```xml
   <?xml version="1.0"?>
<Request>
	<SystemID>SCBS</SystemID>
	<Service>SMEDTLRPTS</Service>
	<ReportType>CRR-II</ReportType>
	<MemberID>1234567</MemberID>
	<UserID>1234567</UserID>
	<ReqNo/>
	<SequenceNo>001</SequenceNo>
	<ReqDate>05/04/2018</ReqDate>
	<PurposeStdCode>CREREV</PurposeStdCode>
	<CostCenterStdCode/>
	<ConsentFlag/>
	<Subject>
		<IdNo1>IC_NO</IdNo1>
		<IdNo2>OLD_IC/PASSPORT_NO</IdNo2>
		<Name>ABU BAKAR</Name>
		<Dob>31/12/1973</Dob>
		<ConstitutionTypeStdCode>011</ConstitutionTypeStdCode>
		<NationalityStdCode></NationalityStdCode>
		<EntityCode></EntityCode>
		<TradeEntityCode></TradeEntityCode>		
		<Email></Email>
		<MobileNo></MobileNo>
	</Subject>
</Request>
```
```php
CBM::getReport($requestXML,  $sendXML=true)
```

This function tries to retrieve the report data from CBM and returns the XML response;
In case of a connection error, it return,

If the request was successful but the query resulted in data related errors, the returned array will have the fields:

code  : contains the error code received from CBM
error : contains the error message received from CBM

A successful request returns the XML of the requested report


**OPTIONAL PARAMETER $sendXML:**
 
 If this parameter is set to false, the function will return the data as an associative array. 
 The XML tag names are the keys of the array, the XML values obviously the data of the array

**FOR LARAVEL SETUP CONFIGURATION:-**

- Do composer require mohdnazrul/laravel-cbm
```php
   composer require mohdnazrul/laravel-cbm
```
- Add this syntax inside config/app.php
```php
   ....
   'providers'=> [
     .
     MohdNazrul\CBMLaravel\CBMServiceProvider::class,
     .
   ],
   'aliases' => [
      .
      'CBMApi' => MohdNazrul\CBMLaravel\CBMApiFacade::class,
      '
    ],
``` 
- Do publish as below
```php
php artisan vendor:publish --tag=cbm 
```
- You can edit the default configuration CBM inside config/cbm.php based your account as below
```php
return [
    'serviceUrl'    =>  env('CBM_URL','http://localhost'),
    'username'      =>  env('CBM_USERNAME','username'),
    'password'      =>  env('CBM_PASSWORD','password')
];
``` 







     
