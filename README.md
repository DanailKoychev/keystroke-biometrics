# Identification using keystroke biometrics

# Idea

The idea is to implement a system that recognizes a person by the way he/she types. To do so we use two metrics - key hold time and a histogram of the time in between keys. The idea is based on [this](http://people.csail.mit.edu/edmond/projects/keystroke/keystroke-biometrics.pdf) paper.

# Implementation

The implementation is in php and javascript and uses no additional libraries besides jQuery.

# Prerequisites

The code expects to find a database containing a table called 'metrics' with 3 columns : username, hold_time, histogram. You have to either create such a table or use the sql script in the db folder. db_create_db.sql will create a database called keystroke_biometrics and a table called metrics and fill it with data from 4 users. db.sql will just create the table and fill it with data from 4 users. 

Default name for the database is keystroke_biometrics with user root and no password, also the address of the DB is localhost. If you want to change any of these edit `CONSTANTS.php`.

# Usage

Just run a web server with a php interpreter and load index.php in a browser.

The interface has two modes - record and identify. 

In record mode you type a text and when you are don you can record yourself in the database. In identify mode you type a text and a guess is shown in the form of "name : degree of similarity". Degree of similarity is a number from 0 to 100, 0 meaning not at all alike, 100 meaning exactly alike.
