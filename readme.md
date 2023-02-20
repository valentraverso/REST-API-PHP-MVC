`#API RESTFUL` `#API` `#PHP` `#MVC` `#EDITABLE`

# API RESTFUL PHP REUSABLE

This API structure could be use in every project, only need to set up a few things to have it running in your hosting or localhost.

## 📝Index 
- [Previous Settings](#⚙️-previous-settings)
- [Features](#features)
- [Developers](#developers)

### ⚙️ Previous Settings

- ***config.php file***

config.php it's the file in wich we will have our first contact with the API, in here you must change the next fields with the ones that correspond to your project.

**Defining the route of your project:**

    define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'].'YOUR ROUTE');

This constant it's important, because if the one that it's going to link the project with the files that it require. <br>
To fullfil it, you need to change the last parameter where contains 'YOUR ROUTE'. <br>
The structure of the link need to be with a slash '/' at the beginning. <br>

