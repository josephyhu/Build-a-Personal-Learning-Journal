# Build a Personal Learning Journal
3rd Treehouse PHP Techdegree project.

## About
This project allows the user to post journal entries that gets added to a database called journal.db. The user can also edit and delete specific entries, and they can even delete all entries.

## Information About Pages
### Home Page (index.php)
This page lists all the entries in descending order by date posted. It also has a search and delete all entries features, and it has pagination.

### Detail Page (detail.php?id={id})
This page displays a specific entry by {id}.

### New Entry Page (new.php)
This page allows the user to post new entries. The allowed fields are entry title, date posted, time spent learning, things learned, resources, and tags. The fields: title, date, time spent, and things learned are all required. The resources and tags fields are optional.

### Edit Entry Page (edit.php?id={id})
This page allows the user to edit a specific entry by {id}. The fields are the same as the fields on the new entry page, but they are all optional.

### Tag Page (tags.php?tag={tag})
This page displays all entries by {tag} also in descending order by date posted.

### Delete and Delete All Pages (delete.php?id={id} and delete_all.php)
These pages deletes a specific entry by {id} and all entries respectively.

### Pages Ending in `_l`
All pages ending in `_l` are exactly the same as the corresponding pages without the `_l` except they have lighter backgrounds.

## Recent Changes
* Added dark background/light background option.
  * Changed the background color to midnight blue for the dark background.
  * Changed all text and link colors to white for the dark background.
* Added the title attribute of 'Home' to the home page button (the button on the top left).
* Set the opacity to .5 for all links and buttons on hover.
* Added search field to the home page.
* Added pagination to the home and the tags pages with the current limit of 25 entries per page.
* Added a select field to the new entry and the edit entry pages which allows the user to select either hour(s) or minute(s) for the time spent.
* Changed the delete link in the detail page to a button with a confirmation box on click.
* Added delete all entries button to the home page with a confirmation box on click.
* Added two links on either side of the copyright in the footer which sends the user to the top of the page.

## Things to Improve
1. Allow the user to set the current limit of entries per page from the following choices: 10, 25, 50, 100, and all.
   * Works on the first page, but does not work on subsequent pages.
1. ~Allow the user to change the background from light to dark and vice versa.~
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

### Light Background:
![Light Background](/img/light-bg.png)
