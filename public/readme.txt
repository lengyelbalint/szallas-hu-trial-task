Telepítés:
1. composer update
2. copy .env.example to .env
3. php artisan key:generate
4. create DB (szallastrial)
5. php artisan migrate:fresh --seed
6. php artisan passport:install


companyFoundationDate letiltása triggerrel - automatikusan létrejön migrate-el - (2023_09_22_145523_create_company_foundation_date_disable_trigger)
Activity lekérdezés prodecúdával - automatikusan létrejön migrate-el - (2023_09_22_074046_create_company_activity_procedure). Végeredménye
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

Compan list by IDs: POST - /api/company-list
Authorization: Bearer Token
Request parameters like: (Postman: Body -> form-data)
ids[] = 1
ids[] = 2
ids[] = 43



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