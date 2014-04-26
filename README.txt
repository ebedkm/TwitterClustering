-Twitter Clustering-


DESCRIPTION
I try to create class to build clustering system of a social network.
In this project I choose Twitter as the social network.
I use https://github.com/abraham/twitteroauth as my library.

There are some functions made in this class. 

1. getLoginURL()
To build login system through Twitter API

2. callback()
To handle the oauth verifier from Twitter login page

3. isConnect()
To check the session. Whether the connection is build.  

4. createFriends()
To make friends list which is a list made of intersection between following list and follower list. 
The result is written to a JSON file. 

5. getFriends()
This function check whether the JSON file exist. It will call the createFriends() if not exists then return 
the data read from JSON file. 
