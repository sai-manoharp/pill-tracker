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

# Pending Work
1. Add more channels to remind - sms, WhatsApp etc. 
2. Put these notifications into Queue
2. After sending these, add records into log database.
2. Add link in the template - it should contain all the pills as URL params. 
3. Based on the URL that user hits, we have to update the status on all pills log records
