`#API RESTFUL` `#API` `#PHP` `#MVC` `#EDITABLE`

# API RESTFUL PHP REUSABLE

This API structure could be use in every project, only need to set up a few things to have it running in your hosting or localhost.

## 📝Index 
- [Previous Settings](#%EF%B8%8F-previous-settings)
- [How to use](#how-to-use)
    - [Columns Allowed](#columns-allowed-endpoint)
    - [Seach by Filters](#filters-endpoint)
    - [Search by Ranges](#ranges-endpoint)
    - [Order By](#order-by-endpoint)
    - [Limit](#limit-endpoint)
    - [Related Tables](#related-tables-endpoint)   
- [Developers](#developers)

### ⚙️ Previous Settings

- ***config.php file***

config.php it's the file in wich we will have our first contact with the API, in here you must change the next fields with the ones that correspond to your project.

1. **The route of your project:**

    define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'].'/YOUR ROUTE');

This constant it's important, because if the one that it's going to link the project with the files that it require. <br>
To fullfil it, you need to change the last parameter where contains 'YOUR ROUTE'. <br>
The structure of the link need to be with a slash '/' at the beginning. <br>

2. **Deep of your project**

    define('DEEP_PROJECT', 'DEEP OF YOUR PROJECT {INT}. EX: 2');

This parameter could be confusing, but it's only how much folders are before the root or main of your project. <br>
🤔 For Example, if the main of your project it's 'C:/Users/X/xampp/htdocs/project-root' and your API it's inside the folder API 'C:/Users/X/xampp/htdocs/project-root/API/' then the deep will we root + the folders between the main folder and the API + the folder of the API. 'project-root' it's the main of the project (0) + we don't have folders beetween + '/API' main folder of the API (1) = deep of the project (1). <br>
Remember that this value need to be like a integer and without quotes.

3. **API KEY**

    define('API_KEY', 'YOUR API KEY');

If you don't have stablish an API KEY, your API it's always going to return "NOT API KEY". <br>
Why? Because the API KEY it's send by header, so first you need to add the API KEY into the parameter (this could be in whatever type of encryptation). Then you must sent it by a header called **auth**. <br><br>

4. **Database Info**

The last step it's modifying the file connection.php inside /models folder.
You need to replace the 4 varibales ($host, $user, $password, $dbName) which the ones that link with your database.

Once you done all this steps, its time to run our API😁

### How to use

Basic structure of an endpoint:

    https://yourdomain.com/:table

:table -> this is going to be the first table that our endpoint will aim

**Filters Endpoint**

    https://yourdomain.com/:table?in=:in&equal=:equal

In: the in parameter its which column are you going to filter (could be 1 or more columns)
Equal: it's the relative value that we want to filter

Pd: This filter it's none a relative parameter, only allows exact coincidencies
