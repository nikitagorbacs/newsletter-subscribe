## Magebit test assignment

## Newsletter subscription page

## Author

Nikita Gorbačs

## Project structure

Project has separate backend and frontend parts.

Frontend was created by using VueJs framework. Sass was used for styling. Vue router was used for client-side routing.

Project has 2 pages:

/ - main/home page

/subscribers - subscribers email list

Backend consists from config directory where Database object is located. In models directory is located SubscriberModel which is responsible for communication with a database. In api directory you can find 3 API's endpoints which are used in the project to get, post and delete data.

## How to run project localy

Development version:

1. Download whole project and place php folder on your server and make sure that your server is running.

2. Create new database. Then create table subscribers with 2 fields - id which is integer + AI and email which has type of a varchar.

3. Go inside the php folder and then inside config folder. Open Database.php file and set your host, database name, username and password.

4. Make sure that npm and vue are installed.

5. Download the frontend part wherever you want. Then go to the project and inside the src folder find views folder and components. Inside views folder go to the file named Subscribers.vue and set a correct API's (delete and read) from your localhost. Then do the same with file named Form.vue inside the components folder.

6. Make sure that everything is done and run command `npm run serve` from the directory where whole frontend part is placed.
