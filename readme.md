# Blogging Content Management system using PHP Laravel and MySQL:

**DESCRIPTION:** 
  - This is a PHP Laravel based Complete blogging content management application which enables the authorized user to create, update, delete posts.
  - The user can also manipulate the post categories and tags belonging to a post.
  - The admin user can create a new authorized user 
  
**FEATURES:**
  - In order to use this application's services, the user has to sign up with this application.
  - Enabled Validation to check whether the entered emailid and password are valid or not.
    **Dashboard:**
      - Before creating a posts the application checks whether there is atleast on category or tag in existence, if not it will raise an  exception and disable the "Store Post"  button.
      - The user have to create categories and tags before posting something
      - Enabled validations to check whether the entered data like  is valid or not
      - All the user and Posts information is stored in the MySQL Database.
      - This application can handle and maintain individual records for each user.

**TECHNICAL FEATURES:**

**FRONTEND:**
   - The application interface renders depending upon the device screen(mobile or web)
   - Used **Responsive Web Design Styling Techniques** for making the application device screen independent 
   - Used **handlebarsJS** for designing and rendering of the front end
   - Used **Express-Session** to maintain the user details within a given session
   - Used **ExpressJS** for building web application
   - Used **momentJS** for displaying the timestamp
   - Hosted this application in **Heroku cloud platform services**

**LINK FOR FRONTEND CODE:**(https://github.com/YashwanthThota/nodejsTodoFrontend)

**BACKEND:**
   - Designed a RestAPI for handling authentication, validation and storing of ToDo information in NoSQL mongoDB
   - the data is exchanged in **JSON** format
   - Designed the RestAPI by using **mongooseJS**, which helps the RestAPI to interact with MongoDB
   - Used **jsonwebtoken** library for security and authentication
   - Used **ExpressJS** for building web application
   - Hosted this application in **Heroku cloud platform services**
 
**LIBRARIES AND PACKAGES:**
 - **Express:** it is a web application framework that provides you with a simple API to build websites, web apps and back ends
 - **hbs:** it is used for building semantic templates
 - **request:** it is used for communicating with 3rd party application
 - **moment:** used for calculating timestamp
 - **MongoDB:** used for handling and maintaining mongoDB
 - **mongoose:** used for manipulating MongoDB
 
**DEMO LINK(HOSTED IN HEROKU):**
 (https://afternoon-harbor-99864.herokuapp.com/)
