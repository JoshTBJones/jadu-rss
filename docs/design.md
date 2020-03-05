# Design Explanation

Although this is just a technical exercise and the delivery is a MVP, I wanted to show how I would go about building a future proofed application.
I try thinking of elements that are not required for an initial release but would make sense at a later date, and implementing them in a minimal way.

The use case I came up with for the app was that of a shared news feed that teams could use to keep track of useful articles or news sites.

When it came to designing the database schema and how the models would interact with each other I had to come up with a 'container'. In this case teams. Each user would belong to a team, and each team would have their own shared RSS feeds.


