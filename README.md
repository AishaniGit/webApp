
OVERVIEW

Web app created to help underprivileged students receive used books and school supplies from donating students, giving those items a second life.

FEATURES

Search and Donate
Users can search for or donate school textbooks and stationery items.
When a requestor clicks the "Request" button for an item, the system sends an internal email to the donor. The donor's email remains private and is not displayed on the screen.
The donor can then contact the requestor based on the information provided by the latter.
 Geolocation Feature (In Progress)
A new feature is currently being developed using Google's geolocation API. This feature will enable requesters to search for donors geographically closest to them.

CODE BASE

The code base of A Second Life includes custom-created plugins written in PHP, HTML, CSS, and JavaScript. These plugins serve various essential functions:

Data Insertion: The plugins facilitate the insertion of books and stationery information into the database based on user inputs on the webpage.

Data Retrieval: They also enable the retrieval of matching books and stationery items from the database using parameters sent from the search page.

Donor Contact: The plugins display buttons for users to contact donors.

Pagination: The system implements pagination for displaying search results, enhancing the user experience.

The PHPMailer, generously shared by a contributor on GitHub, is used for sending email communications to contact donors.
