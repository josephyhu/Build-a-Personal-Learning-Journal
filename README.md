# Build a Personal Learning Journal
3rd Treehouse PHP Techdegree project.

## Recent Changes
* Changed the background color from white to black.
* Changed the background color again from black to midnight blue.
* Added the title attribute of 'Home' to the home page button (the button on the top left).
* Set the opacity to .5 for all links and buttons on hover.
* Added search field to the index.php page.
* Added pagination to the index.php and the tags.php pages with the current limit of 25 entries per page.
* Added a select field to the new.php and the edit.php pages which allows the user to select either hour(s) or minute(s) for the time spent.
* Changed the delete link in the detail.php file to a button with a confirmation box on click.
* Added delete all entries button to the index.php file with a confirmation box on click.
* Added two links on either side of the copyright in the footer which sends the user to the top of the page.

## Things to Improve
1. Allow the user to set the current limit of entries per page from the following choices: 10, 25, 50, 100, and all.
   * Works on the first page, but does not work on subsequent pages.
1. Allow the user to change the background from light to dark and vice versa.
1. Prevent the Next Page button from showing on the last page if there are exactly 25 (or whatever limit the user has set if (1) has been implemented) entries on that page. No problems if there are less than 25 (or whatever limit the user has set if (1) has been implemented) entries on the page.

## Screenshots
### Home Page:
![First Page](/img/home-p1.png)
![Middle Page](/img/home-p2.png)
![Last Page](/img/home-p3.png)
![Search](/img/search.png)

### Detail Page:
![Top](/img/detail-top.png)
![Bottom](/img/detail-bottom.png)
![Delete Confirmation Box](/img/delete-confirmation-box.png)

### New Entry Page:
![Top](/img/new-entry-top.png)
![Middle](/img/new-entry-middle.png)

### Edit Entry Page:
![Top](/img/edit-entry-top.png)
![Middle](/img/edit-entry-middle.png)

### Tag Page:
![Top](/img/tag-top.png)
![Bottom](/img/tag-bottom.png)

### Delete All Entries:
![Delete All](/img/delete-all.png)
![Entries Deleted](/img/entries-deleted.png)
