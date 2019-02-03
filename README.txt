I created a very simple comment section where the user may log in as certain usernames to comment on a picture
of my dog dressed up as a taco.  It makes use of session arrays to store usernames, passwords, and comments.

Upon opening the website, the user will not be able to submit a comment because they have not chosen a username. 

Clicking "Set User" takes the user to a page where they may enter a username and password.  If it is the first time a username is used, that name's password will be set upon logging in for the first time.  The user may change their name as they wish, but must enter the 
same password they used for that username each time.  

When the user enters a comment, the page refreshes and the comment appears under the button.  Subsequent comments will be continue to 
be added below.

"exampleimage.png" shows an example of what the main page will look like after several comments have been made.

If the user attempts to log in to a username with the wrong password (i.e. a different password than what they originally set for that
username), they will be met with an error page and will have to fill out the form again.  The same will happen if the user leaves any
text box blank when they try to log in.
