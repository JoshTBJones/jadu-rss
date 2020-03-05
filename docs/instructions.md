# user Guide
This document assumes that your app is up and running and you're ready to use it.
If not, you can find setup instructions in the aptly named setup_instructions.md.

**Logging In**
This application features a very basic session based authentication service, which requires you to login.
Email: test@example.com
Password: password

Once logged in, you will be greeted with the feeds index.

**Feeds Index**
The feeds index displays all available RSS feeds. By default you will see the PHP News and Slashdot feeds.
Each feed has two options:
  1. View, this gets the RSS data from the source and displays it for you to read.
  2. Edit, this takes you to the feed edit view where they can modify the model data.

The feeds index view also displays the 'Add New Feed' button, which allows you to... add more feeds.

**Feed Edit View**
Here you can update the name of the feed, and update its source.
You can also delete the feed from the database.

**Add New Feed**
This is essentially the same view as the edit feed view. You can input the name of the RSS feed you want, and add its source.
Once saved you will be redirected back to the feeds index view where you will be able to view your new feed.

**Feed Reader**
This view simply displays the RSS feed.
The view is paginated and limited to 10 items per page.
Each item is a link which will take you to the source data.
