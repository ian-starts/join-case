
# JOIN.Marketing Case
A project for timestamped marketing cases. This project does the pretty simple task of creating a stateless API for the following Domain Entities:
* Advertisers
* Campaigns
* Deliverables
* Influencers

To keep it as abstract as possible, there is one URL for getting deliverables. From this URL you can filter on: 
* DateRange
* Status
* Advertiser
* Campaign
* Influencer

But more on that later.

The mailer is not implemented due to the ease of creating an email in laravel.
The application has checks on certain Events on the Deliverable Model. It checks for a create event and for a deadline updated event. 
When one of these events is triggered, an event is broadcasted, with mailers listening for those events.
See the TODO's for more info.

## Requirements
* Docker

## Installation

* clone the repo and enter the directory
* `cp .env.example .env`
* run `docker-compose up`
* run `composer install` or if you don't want to install composer run 
```bash
docker exec -it join-case-local composer install   
```
* run `php artisan migrate` or 
```bash
docker exec -it join-case-local php artisan migrate 
```
* run `php artisan db:seed` or 
```bash
docker exec -it join-case-local php artisan db:seed 
```
go to https://localhost to see if it's running. 

The DockerFile automatically handles self signed SSL certs through letsencrypt, and only listens on port 443. This can be disabled in the docker-compose.yml.

## API
### Login
The deliverables are under a protected JWT middleware. This implements standard JWT calls:

* Signup: 
	* method: post 
	* url: **api/auth/signup**
	* body:

```json
{
	"email": "test@test.nl",
	"password": "test",
	"name": "test"
}
```

* Login
	* method : post 	
	* url:  **api/auth/login**
	* body:

```json
{
	"email": "test@test.nl",
	"password": "test",
}
```

These calls return a JWT Token in the response. Use the JWT Token in the headers to access protected routes:

`Authorization: Bearer {Token}`

### Embed
On the list call (`api/{entity}`) you can use the embed like so:

`api/deliverables?embeds[]=campaign`

Nested relations follow the `.` syntax:

`api/deliverables?embeds[]=campaign.advertiser`

### Search
To search the api use

`api/deliverables?filters[{filter-name}]=foobar`

You can substitute `{filter-name}` with the following attributes:

* `advertiser` followed by advertiser uuid (`filters[advertiser]=618fe6c6-7558-4a73-8530-ef0a13676e5c`)
* `campaign` followed by campaign uuid(`filters[campaign]=618fe6c6-7558-4a73-8530-ef0a13676e5c`)
* `influencer` followed by influencer uuid(`filters[influencer]=618fe6c6-7558-4a73-8530-ef0a13676e5c`)
* `status` (`filters[status]=pending`)
* `dateRange` (`filters[dateRange][]={rangeStart}&filters[dateRange][]={rangeEnd}`)

You can of course combine these filters and embeds however you see fit.


### Paginator
To change the responsesize from the paginator use the `pagesize` paramater:

`api/deliverables?pagesize=20`

Or use the `page` parameter to go the next page:

`api/deliverables?page=2`


