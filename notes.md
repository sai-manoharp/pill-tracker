# Sanitization
## PHP CS
Run the command `./vendor/bin/phpcs`
## PHP CBF
Run the command `./vendor/bin/phpcbf`

# API End points
## Patients
### Get all patients
Endpoint - {{URL}}/patients

## Pills
### Get all pills
Endpoint - {{URL}}/pills
### Get patients by schedule
Endpoint - {{URL}}/patients/schedule/{schedule}
Ex - {{URL}}/patients/schedule/morning

## Commands
Command to run background job to send pill reminder.
`php artisan command:SendPillReminder --schedule=morning`

# Pending features
1. Postpone feature - retry sending notification after 'x' minutes. 
2. Add more channels to remind - sms, WhatsApp etc. 


# Technical improvements
1. Add logging
2. Add exceptions and handle them properly. 
3. Queue the notifications, right now they are done synchronously. 
4. Put these notifications into Queue.
5. Get the error messages from language files. 
6. Handle notifications properly - create some database structures to save the log and to retry during postpone - just use that communication log table, instead of querying all again. 
7. Update pills log table to not contain duplicate entry of a scheduleId in day - create a date column which auto populates current day. use a composite primary key of schedule_id and that date column. 





