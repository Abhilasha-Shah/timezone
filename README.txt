DATE AND TIME AS PER TIMEZONE 

======================================

This is a custom module to display date and time as per timezone selected from backend.

======================================

DESCRIPTION

======================================

ADMIN CONFIGURATION form which will take the following inputs:
               Country - text field
               City - text field
               Timezone - select list
                       Options in the select list
                       America/Chicago
                       America/New_York
	     Asia/Tokyo
	     Asia/Dubai
	     Asia/Kolkata
	     Europe/Amsterdam
	     Europe/Oslo
 	     Europe/London

Service that will return the current time based on the time zone selection in the above form. Returns time in the format 19th Sept 2022 - 11:15 AM.
Block plugin that will render the Location from the configuration set in the configuration form and the current time calling the service in the previous step. 

===========================================

CRITERIA TAKEN CARE OF

===========================================

Default configurations are provided by the module.
Since this block will be placed on all the pages, caching is enabled on the block. 
However, the time is updated without a cache rebuild.
Any service calls is done using Dependency Injection. Any direct calls to services are not done.
Drupal coding standards are followed and DrupalPractice code standards using PHP CodeSniffer. 