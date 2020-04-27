zpBootstrap 
============

zpBootstrap is a « Responsive » theme for [Zenphoto CMS](https://www.zenphoto.org), based on [Bootstrap framework](https://getbootstrap.com/docs/3.4/).

Feel free to download and use it, and thanks in advance for your feedback!

### Important
To use the release **2.3** of the theme, you must have **ZenPhoto 1.5.6 or more**.
If you use another release of ZenPhoto, see [archives of zpBootstrape on Github](https://github.com/vincent3569/zpBootstrap/releases).

You can report bugs of this theme on the [Zenphoto forum](https://forum.zenphoto.org/) or by creating an issue on [GitHub](https://github.com/vincent3569/zpBootstrap/issues), I will fix it as soon as possible (only the latest version is supported). You can also help to improve this theme via [Pull requests](https://github.com/vincent3569/zpBootstrap/pulls).

Please note that the Zenphoto team advise to regulary upgrade with the latest version of Zenphoto to benefit from the latest features of the application, to solve the various security holes, and to benefit from the support of the Zenphoto team.

Description
-----------

Scripts used:
- Bootstrap (HTML, CSS, and JS toolkit for Responsive WebSite)
- Flexslider (a fully responsive jQuery slider plugin)
- FancyBox (lightbox jQuery plugin for displaying images. Touch enabled, responsive and fully customizable)
- AddThis (snippet to add sharing tools to your site)
- Inifite Scroll (jQuery plugin that automatically adds the next page)
- script for navigation with the arrow keys on single news pages and images pages

The theme supports the following ZenPhoto plugins:
- cacheManager, comment_form, contact_form, dynamic-locale, favoritesHandler, flag_thumbnail, GoogleMap (**colorbox option not supported**), menu_manager (**new**), openstreetmap, rating, register_user, user_login-out, zenpage

### Installation
- Upload the zip file to your computer,
- Unzip the downloaded zip file locally, and upload the zpBootstrap folder to the directory /themes/ of your Zenphoto site,
- In Zenphoto administration, go to the Themes tab and activate the zpBootstrap theme,
- Navigate to Options>Theme to view and configure the available options for zpBootstrap.

### Options
- You can display a home page, with a slider of 5 random picts, the gallery description and the latest news (if zenpage is used),
- You can use "isotope" jQuery plugin to display albums. This layout allows to display uncropped thumbnails and to filter them based on their tags,
- You can use "infinite-scroll" jQuery plugin. This layout will automatically load items of next page (albums, images or news) without pagination,
- With the GDPR requirements, you can create a page "Data privacy policy page" in Options>Security. A link in the footer will be automatically added to this page,
- Only one RSS Feed is displayed: go to options>RSS and select the RSS feed to use (RSS Feed "All News" has priority over RSS Feed "Gallery").

### Tips
- In admin>options>gallery, enter the title of your website, the title and description of your gallery
- Make responsive images in news and pages: edit the html source of your news and pages and add class="remove-attributes img-responsive" on each image (the result should be ```<img class="remove-attributes img-responsive" src="the_path_to_your_image"/>```)

### ChangeLog
Please, read [changelog.txt](https://github.com/vincent3569/zpBootstrap/blob/master/changelog.txt)
