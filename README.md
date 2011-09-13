About
=====
This is a block plugin to add OpenSocial gadgets on the right-side bar of Moodle.
OpenSocial gadgets are rendered via Apache Shindig (version 2.0).

Requirements
============
* Moodle 2.1 (was not checked on previous versions!)
* Apache Shindig 2.0
* For OpenSocial APIs - installation of [another moodle plugin for OpenSocial Gadgets](https://github.com/vohtaski/shindig-moodle-mod)

Installation and Settings
=========================
Installation
------------
* Rename this folder to shindig and drop it to moodle->blocks. 
* Go in Moodle to Site Administration->Notifications and install plugin
* Specify the Apache Shindig installation to use for gadgets (see Global settings below)

Global settings
---------------
You can specify the url at which your Apache Shindig is running:
Settings->Site administration->Plugins->Blocks->OpenSocial gadget

1. If you only want to render gadgets, you can specify any existing shindig installation
in the cloud.
2. The best way is to use Apache Shindig extended with Spaces. this way you also support OpenSocial APIs. For this, please install [another moodle plugin for OpenSocial Gadgets](https://github.com/vohtaski/shindig-moodle-mod) and use the shindig that comes with it. See installation instructions there. 

Settings per gadget
-------------------
You can add as many OpenSocial gadgets as you like.
For every gadget block you can specify **url**, **name** and **height**.
Just click on configuration button in the block (when in editing mode).

License
=======
Moodle block plugin - GPL
-------------------

    // This plugin is part of Moodle - http://moodle.org/
    //
    // Moodle is free software: you can redistribute it and/or modify
    // it under the terms of the GNU General Public License as published by
    // the Free Software Foundation, either version 3 of the License, or
    // (at your option) any later version.
    //
    // Moodle is distributed in the hope that it will be useful,
    // but WITHOUT ANY WARRANTY; without even the implied warranty of
    // MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    // GNU General Public License for more details.
    //
    // You should have received a copy of the GNU General Public License
    // along with Moodle.  If not, see <http://www.gnu.org/licenses/>.