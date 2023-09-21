Telepítés:
1. composer update
2. php artisan passport:install
3. php artisan migrate:fresh --seed

companyFoundationDate letiltása triggerrel - automatikusan létrejön migrate-el - (2023_09_18_145523_create_company_foundation_date_disable_trigger)
Activity lekérdezés prodecúdával - automatikusan létrejön migrate-el - (2023_09_19_074046_create_company_activity_procedure). Végeredménye
2001.01.01-től lévő lekérdezés

API Teszthez:

Register: POST - /api/register
Request parameters:
name
email (email)
password (min:6)

Login: POST - /api/login
Request parameters:
email
password
Response: User + access_token

Company list: GET - /api/companies
Authorization: Bearer Token

Get Compay By Id: GET - /api/companies/1
Authorization: Bearer Token

Create New Company: POST - /api/companies
Authorization: Bearer Token

Request parameters:
companyName
companyRegistrationNumber
companyFoundationDate (date)
country
zipCode
city
streetAddress
latitude (between:-90,90)
longitude (between:-180,180)
companyOwner
employees (int)
activity
email (email)
active (true, false, 1, 0)
employees (int)
password (min:6)

Update Company: PUT - /api/companies/1
Authorization: Bearer Token

Request parameters:
companyId
companyName
companyRegistrationNumber
companyFoundationDate (date)
country
zipCode
city
streetAddress
latitude (between:-90,90)
longitude (between:-180,180)
companyOwner
employees (int)
activity
email (email)
active (true, false, 1, 0)
employees (int)
password (min:6)