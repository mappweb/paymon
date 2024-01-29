## About

Registration of video resources. Includes video management by user account with administrator role and public access to view content.

* ~/documents/Design%doc.docx
* ~/documents/relational-model.png

## Experience

The requirements were analyzed. The relational model was designed with the entities identified as users, videos and video search and playback auditing. We took advantage of Laravel's set of utilities to make the process flow simple, scalable and readable. Some of the SOLID principles were applied. I was able to elaborate some details of the flow, based on the results returned by the unit test suite.

## External Libraries

* [Laravel Roles](https://github.com/jeremykenedy/laravel-roles): A Powerful package for handling roles and permissions in Laravel. .
* [livewire](https://laravel-livewire.com/docs/2.x/quickstart): Livewire is a full-stack framework for Laravel that makes building dynamic interfaces simple, without leaving the comfort of Laravel.

## Contributing

Thanks to God for his wisdom and to my wife for believing that I could.
## Api

Documentations: ~/documents/Paymon.postman_collection.json

### Login [POST]
* uri
> POST /api/v1/login
>
* Params
>{
"email": "diego.toscanof@gmail.com",
"password": "12345678"
}
### Logout [POST]
* uri
> POST /api/v1/logout
>
* Headers
> { "authorization": "bearer {token}" }

## Compile asset

> npm run build
> 
