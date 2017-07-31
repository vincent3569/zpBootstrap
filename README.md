zpBootstrap 
============

zpBootstrap is a « Responsive » theme for [ZenPhoto CMS](http://www.zenphoto.org), based on [Bootstrap framework](http://getbootstrap.com/).

Feel free to download and use it, and thanks in advance for your feedback!

Description
-----------

Scripts used:
- Bootstrap (HTML, CSS, and JS toolkit for Responsive WebSite)
- Flexslider (a fully responsive jQuery slider plugin)
- AddThis (snippet to add sharing tools to your site)
- Colorbox (lightweight customizable lightbox plugin for jQuery)
- script for navigation with the arrow keys.

The theme supports the following ZenPhoto plugins:

- comment_form, contact_form, dynamic-locale, flag_thumbnail, GoogleMap, rating, register_user, user_login-out, zenpage

The theme does not support the following ZenPhoto plugins:
- colorbox and slideshow (zpBoostrap uses and configures it's own colorbox and modal plugins)

### Important
To use the release **1.4.3** of the theme, you must have **ZenPhoto 1.4.3 or more**.
If you use another release of ZenPhoto, see [archives of zpBootstrape on Github](https://github.com/vincent3569/zpBootstrap/releases).

Report issues on the [ZenPhoto forum](http://www.zenphoto.org/support/) or create a new issue on [GitHub](https://github.com/vincent3569/zpBootstrap/issues) and I will fix it as soon as possible (only the latest version is supported).

Please note that the ZenPhoto team advise to regulary upgrade its site with the latest version of ZenPhoto to benefit from the latest features of the application, to solve the various security holes, and to benefit from the support of the ZenPhoto team.

### Installation
- Upload the zip file to your computer,
- Unzip the downloaded zip file locally, and upload the zpBoostrap folder to the directory /themes/ of your ZenPhoto site,
- In ZenPhoto administration, go to the Themes tab and activate the zpBootstrap theme,
- Navigate to Options>Theme to view and configure the available options for zpBootstrap.

### Options
- You can display a home page, with a slider of 5 random picts, the gallery description and the latest news (if zenpage is used),
- Only one RSS Feed is displayed: go to options>RSS and select the RSS feed to use (RSS Feed "All News" has priority over RSS Feed "Gallery").

### Tips
- Enter the title and url of your website, the title and description of your gallery in admin>options>gallery.
- Make responsive images in news and pages : to do that, edit the html source of news and pages and add class="remove-attributes" on each image (the result should be < img class="remove-attributes" src="the_path_to_your_image" />)

### ChangeLog
Please, read [changelog.txt](https://github.com/vincent3569/zpBootstrap/blob/master/changelog.txt)