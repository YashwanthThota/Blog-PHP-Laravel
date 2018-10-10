# Blogging Content Management system using PHP Laravel and MySQL:

**DESCRIPTION:** 
  - This is a PHP Laravel based Complete blogging content management application which enables the authorized user to create, update, delete posts in the blog.
  - The user can also manipulate the post categories and tags belonging to a post.
  - The user with 'Admin level permissions' can create a new user and he can also edit the permissions of the users. 
  - The viewers can comment to post and can also share the post to the social media platform like facebook, twitter, googleplus. 
  
**FEATURES:**
  - In order to use this application's services, the user has to sign up with this application.
  - Enabled Validation to check whether the entered emailid and password are valid or not.
  - This application mainly comprises 2 parts dashboard and blogsite.
  - **Dashboard:**
      - Before creating a posts the application checks whether there is atleast on category or tag in existence, if not it will raise an  exception and disable the "Store Post"  button.
      - The user have to create categories and tags before posting something.
      - Enabled validations to check whether there are any blank fields or the entered data like website's url, image format, email id is valid or not
      - Only user with 'Admin level permissions' can create or delete a user profile
      - The Admin user can also enable or disable 'Admin permission' to other user that possess the same permissions.
      - the Admin user can also edit the settings like location, contact, sitename etc., 
      - The user can upload images to the posts and they can also add profile pictures.
      - enabled 'Soft Delete' option for post deletion, so all the deleted posts were moved to 'trashed posts' category and from there the user can either recover or delete the post completely from the system. 
      - All the users, posts, tags, categories and image information is stored in the MySQL Database.
      - This application can handle and maintain individual records for each user.
  - **Blogsite:** 
      - The main site contains a list of categories and posts
      - The Website highlights the latest 3 posts(sorted based on timestamp) by displaying them with big thumbnail images.
      - The Page also displays atmost 3 latest posts(sorted based on timestamp) in each categories.
      - Add search feature which helps the user to search for posts by using the keywords present in the heading, it diplays all the posts with matching keywords.
      - The user can comment to a post and he can also share the post in the social media platforms like facebook, twitter, google plus.
      - Added page nation that enables the user hop from one post to other post present in the system. 
      - finally the user can subscribe to the page by providing their email.

**TECHNICAL FEATURES:**

   - The application interface renders depending upon the device screen(mobile or web)
   - Used **Responsive Web Design Styling Techniques** for making the application device screen independent 
   - Used **DISQUS Commenting platform** to add the commenting section to the posts
   - Used **AddThis Service** to enable the post sharing to different social media platforms
   - Used **mailChimp Service** to enable the subscription service to the blog
   - Incorporated **Summernote editor** for creating posts with different stylings
   - Used **Laravel migrations** for designing the database
   - designed **CRUD** operations for database manipulation
   - the application and database are hosted in **heroku cloud services**


 
**LIBRARIES AND PACKAGES:**
 - **PHP Carbon API:** this is used for converting the post timestamp to human understandable format
 - **Toastr:** this bootstarp library is used to display the notification messages.
 
**DEMO LINK(HOSTED IN HEROKU):**
- **Mainsite:**
 (https://pure-mesa-60204.herokuapp.com/)
 
- **Dashboard:**
 (https://pure-mesa-60204.herokuapp.com/login)
  - **credientials:**
   **Email:** testuser@gmail.com
   **Password:** testuser




