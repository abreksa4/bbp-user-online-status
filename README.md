# BBP User Online Status
A Wordpress plugin to show user online/offline statuses in bbpress topics and replies

Simply adds an "Online" or "Offline" under the author information in [bbpress](https://bbpress.org/) topics and replies.

Parts of code adapted from Robin Wilson's [bbp profile information](https://wordpress.org/plugins/bbp-profile-information/), Raul Illana's [Awebsome! Online Registered Users Widget](https://wordpress.org/plugins/awebsome-online-registered-users-widget/), and from [onetrickpony](http://wordpress.stackexchange.com/questions/34429/how-to-check-if-a-user-not-current-user-is-logged-in) at stackoverflow.

Online
![](https://github.com/abreksa4/bbp-user-online-status/blob/master/assets/screenshot-1.PNG?raw=true)

Offline
![](https://github.com/abreksa4/bbp-user-online-status/blob/master/assets/screenshot-2.PNG?raw=true)

Settings
![](https://github.com/abreksa4/bbp-user-online-status/blob/master/assets/screenshot-3.PNG?raw=true)

*How does BBP User Online Status check keep track of who's online?*

Whenever a user logs in or logs out, a variable is set or unset respectively. If a user doesn't logout, 
if the user has been inactive for more than 15 minuets, there status is set as offline. 

TODO

* Make inactive time configurable
* Include images in addition to text (configurable)
* Make location configurable
* Make text configurable
