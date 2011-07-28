About
-----
This is a plugin to add OpenSocial gadget on the right bar of Moodle (called blocks).
OpenSocial gadgets are rendered via Apache Shindig (version 2.0).

If you wish to support OpenSocial APIs in your gadgets you should patch the core
Apache Shindig with Moodle-extensions to match OpenSocial APIs with Moodle database schema (coming soon).

Requirements
------------
Moodle 2.1 (was not checked on previous versions!)
Apache Shindig 2.0

Installation
------------
Rename this folder to shindig and drop it to moodle->blocks. 

Global settings
---------------
You can specify the url at which your Apache Shindig is running:
Settings->Site administration->Plugins->Blocks->OpenSocial gadget

Settings per gadget
-------------------
You can add as many OpenSocial gadgets as you like.
For every gadget block you can specify **url**, **name** and **height**.