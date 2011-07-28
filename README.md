About
-----
This is a block plugin to add OpenSocial gadgets on the right-side bar of Moodle.
OpenSocial gadgets are rendered via Apache Shindig (version 2.0).

Requirements
------------
* Moodle 2.1 (was not checked on previous versions!)
* Apache Shindig 2.0

Installation
------------
* Rename this folder to shindig and drop it to moodle->blocks. 
* Go in Moodle to Site Administration->Notifications and install plugin
* Specify the Apache Shindig installation to use for gadgets (see Global settings below)

If you only want to render gadgets, you can specify any existing shindig installation
in the cloud. If you want to support OpenSocial APIs, you should
connect your shindig installation to your Moodle database. You will need to patch the core
Apache Shindig with Moodle-extensions to match OpenSocial APIs with Moodle database schema (patch is coming soon).

Global settings
---------------
You can specify the url at which your Apache Shindig is running:
Settings->Site administration->Plugins->Blocks->OpenSocial gadget

Settings per gadget
-------------------
You can add as many OpenSocial gadgets as you like.
For every gadget block you can specify **url**, **name** and **height**.
Just click on configuration button in the block (when in editing mode).