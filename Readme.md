[09:10] <       aisha> | The task is to ingest an API, persist data in a database, and allow for deletion in the db (and on the screen) via a command from the webpage. Please use Postgres for the database and jQuery on the front-end.
[09:10] <       aisha> | The details: the page should have a button that pulls in new data from the API and puts it in the database. For example, you might query a movies API for your favorite movie and add specific information on that movie to your database. Include an edit button so that you can update each record with your own notes. The page should have a table that shows the data in the db and a delete button to delete a row. The calls should be made using ajax.


I took a book api, wrote a wrapper for it in PHP, and made a html table and a reload button to reload the data in the table.

Originally had the PHP spit out the table, but that goes against the assignment, rewrote it in js.

The table has buttons that will call a different api function and pass the appropriate data, but all it does is connect to the database, and does not actually insert/update.

I mean it was only a day of work, much of which I spent helping others get started.
