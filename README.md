# Sport Club Information System

it's a web site project for sport clubs

#### web site link: http://sportclub.great-site.net/ 
#### admin panel link: http://sportclub.great-site.net/admin/panel.php

## Getting Started

In this project I did as a web-based programming course assignment; HTML5, CSS3, Javascript, Bootstrap, php and mySQL technologies were used. The purpose of the project: to develop a website for a sports club where sportsmans can log in and view themselves profile,  which will promote the sports club to other users. For updates in the sites, an admin panel is developed.

![website](https://user-images.githubusercontent.com/77548038/174429888-13a16a20-fa37-4494-8529-60b46e655aba.png)
Ana sayfa

![profile](https://user-images.githubusercontent.com/77548038/174430294-a1676f74-0c57-43ab-a40f-3c54a0fdf354.png)
Sporcu paneli

![panel](https://user-images.githubusercontent.com/77548038/174430337-b96b6216-355f-404b-a87e-3c967e2e2264.PNG)
Admin Paneli


### Prerequisites

To run this application on your own computer, you need an apache server and a mySQL server. You can use xampp tool which provides all of these for you. You can download and install the program from this link: https://www.apachefriends.org/download.html


### Installing
For the application installed, first make sure that apache and mySQL servers are running smoothly on xampp.

![xampp](https://user-images.githubusercontent.com/77548038/174430805-8d2922b1-23a9-4e4d-9951-76b097857905.png)

1- Run Apache and mySQL servers via xampp. The background color turns green when the servers are running.
2- Open phpMyAdmin in your browser. For this, you need to write http://localhost/phpmyadmin/ in your browser's address bar.
3- Create a new schema named phpProject.
![phpadmin](https://user-images.githubusercontent.com/77548038/174431056-d84fd084-2865-40ef-9e99-223dfb928452.png)
4- Go to the SQL section and copy and run the codes in sql/db.sql on github. With this process, your database will be ready.
![sql](https://user-images.githubusercontent.com/77548038/174431166-cfc8b3a4-9fbe-46fb-a17f-fe54e8828008.png)
5- Go to the directory where the xampp program is and find htdocs folder in this directory. 
6- Move the project folder on github to the htdocs directory.
7- it's ready. You can reach the home page at http://localhost/project/index.php and admin page at http://localhost/project/admin/panel.php

A step by step series of examples that tell you how to get a development env running

Say what the step will be

```
Give the example
```

And repeat

```
until finished
```

End with an example of getting some data out of the system or using it for a little demo

## Running the tests

Explain how to run the automated tests for this system

### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Deployment

Add additional notes about how to deploy this on a live system

## Built With

* [Dropwizard](http://www.dropwizard.io/1.0.2/docs/) - The web framework used
* [Maven](https://maven.apache.org/) - Dependency Management
* [ROME](https://rometools.github.io/rome/) - Used to generate RSS Feeds

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **Billie Thompson** - *Initial work* - [PurpleBooth](https://github.com/PurpleBooth)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone whose code was used
* Inspiration
* etc
