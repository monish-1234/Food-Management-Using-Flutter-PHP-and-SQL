# Food Management Using Flutter PHP and SQL

This is the server side script. 

The App is available @ 
*to be added*

## How it Works 

The Client App Scans the QR code using the Integrated QR Scanner and Send the User ID and Mode to this server script via JSON.

This Script Decodes the JSON, Verifies the USER ID, Checks/Updates the DB and send back appropriate response codes.

- Response Code - 380 - DB Successfully Updated
- Response Code - 381 - Already Exists in DB
- Response Code - 382 - Unknown Error
- Response Code - 404.1 - Invalid User ID 
- Response Code - 404.2 - Invalid Mode 

