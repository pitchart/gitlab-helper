Gitlab helper
=============

* config
* help
* info
* list
* selfupdate

**group:**

* group:create
* group:list
* group:members
* group:members:add
* group:projects

**key:**

* key:add
* key:list

**project:**

* project:list

config
------

* Description: Defines application settings
* Usage:

  * `config`

Defines application settings

### Options:

**help:**

* Name: `--help`
* Shortcut: `-h`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this help message
* Default: `false`

**quiet:**

* Name: `--quiet`
* Shortcut: `-q`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not output any message
* Default: `false`

**verbose:**

* Name: `--verbose`
* Shortcut: `-v|-vv|-vvv`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
* Default: `false`

**version:**

* Name: `--version`
* Shortcut: `-V`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this application version
* Default: `false`

**ansi:**

* Name: `--ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Force ANSI output
* Default: `false`

**no-ansi:**

* Name: `--no-ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Disable ANSI output
* Default: `false`

**no-interaction:**

* Name: `--no-interaction`
* Shortcut: `-n`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not ask any interactive question
* Default: `false`

help
----

* Description: Displays help for a command
* Usage:

  * `help [--format FORMAT] [--raw] [--] [<command_name>]`

The <info>help</info> command displays help for a given command:

  <info>php bin/gitlab-helper.php help list</info>

You can also output the help in other formats by using the <comment>--format</comment> option:

  <info>php bin/gitlab-helper.php help --format=xml list</info>

To display the list of available commands, please use the <info>list</info> command.

### Arguments:

**command_name:**

* Name: command_name
* Is required: no
* Is array: no
* Description: The command name
* Default: `'help'`

### Options:

**format:**

* Name: `--format`
* Shortcut: <none>
* Accept value: yes
* Is value required: yes
* Is multiple: no
* Description: The output format (txt, xml, json, or md)
* Default: `'txt'`

**raw:**

* Name: `--raw`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: To output raw command help
* Default: `false`

**help:**

* Name: `--help`
* Shortcut: `-h`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this help message
* Default: `false`

**quiet:**

* Name: `--quiet`
* Shortcut: `-q`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not output any message
* Default: `false`

**verbose:**

* Name: `--verbose`
* Shortcut: `-v|-vv|-vvv`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
* Default: `false`

**version:**

* Name: `--version`
* Shortcut: `-V`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this application version
* Default: `false`

**ansi:**

* Name: `--ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Force ANSI output
* Default: `false`

**no-ansi:**

* Name: `--no-ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Disable ANSI output
* Default: `false`

**no-interaction:**

* Name: `--no-interaction`
* Shortcut: `-n`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not ask any interactive question
* Default: `false`

info
----

* Description: Displays information about application
* Usage:

  * `info`

Displays information about application

### Options:

**help:**

* Name: `--help`
* Shortcut: `-h`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this help message
* Default: `false`

**quiet:**

* Name: `--quiet`
* Shortcut: `-q`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not output any message
* Default: `false`

**verbose:**

* Name: `--verbose`
* Shortcut: `-v|-vv|-vvv`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
* Default: `false`

**version:**

* Name: `--version`
* Shortcut: `-V`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this application version
* Default: `false`

**ansi:**

* Name: `--ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Force ANSI output
* Default: `false`

**no-ansi:**

* Name: `--no-ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Disable ANSI output
* Default: `false`

**no-interaction:**

* Name: `--no-interaction`
* Shortcut: `-n`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not ask any interactive question
* Default: `false`

list
----

* Description: Lists commands
* Usage:

  * `list [--raw] [--format FORMAT] [--] [<namespace>]`

The <info>list</info> command lists all commands:

  <info>php bin/gitlab-helper.php list</info>

You can also display the commands for a specific namespace:

  <info>php bin/gitlab-helper.php list test</info>

You can also output the information in other formats by using the <comment>--format</comment> option:

  <info>php bin/gitlab-helper.php list --format=xml</info>

It's also possible to get raw list of commands (useful for embedding command runner):

  <info>php bin/gitlab-helper.php list --raw</info>

### Arguments:

**namespace:**

* Name: namespace
* Is required: no
* Is array: no
* Description: The namespace name
* Default: `NULL`

### Options:

**raw:**

* Name: `--raw`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: To output raw command list
* Default: `false`

**format:**

* Name: `--format`
* Shortcut: <none>
* Accept value: yes
* Is value required: yes
* Is multiple: no
* Description: The output format (txt, xml, json, or md)
* Default: `'txt'`

selfupdate
----------

* Description: Updates application
* Usage:

  * `selfupdate`

The <info>selfupdate</info> command updates the application to the latest version:
  <info>php bin/gitlab-helper.php selfupdate</info>

### Options:

**help:**

* Name: `--help`
* Shortcut: `-h`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this help message
* Default: `false`

**quiet:**

* Name: `--quiet`
* Shortcut: `-q`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not output any message
* Default: `false`

**verbose:**

* Name: `--verbose`
* Shortcut: `-v|-vv|-vvv`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
* Default: `false`

**version:**

* Name: `--version`
* Shortcut: `-V`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this application version
* Default: `false`

**ansi:**

* Name: `--ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Force ANSI output
* Default: `false`

**no-ansi:**

* Name: `--no-ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Disable ANSI output
* Default: `false`

**no-interaction:**

* Name: `--no-interaction`
* Shortcut: `-n`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not ask any interactive question
* Default: `false`

group:create
------------

* Description: Creates a new gitlab group
* Usage:

  * `group:create [--desc [DESC]] [--level [LEVEL]] [--] <name> <path>`

Creates a new gitlab group

### Arguments:

**name:**

* Name: name
* Is required: yes
* Is array: no
* Description: The name of the group
* Default: `NULL`

**path:**

* Name: path
* Is required: yes
* Is array: no
* Description: The path of the group
* Default: `NULL`

### Options:

**desc:**

* Name: `--desc`
* Shortcut: <none>
* Accept value: yes
* Is value required: no
* Is multiple: no
* Description: The description of the group
* Default: `''`

**level:**

* Name: `--level`
* Shortcut: <none>
* Accept value: yes
* Is value required: no
* Is multiple: no
* Description: Visibility level : 0 for private, 10 for internal, 20 for public.
* Default: `0`

**help:**

* Name: `--help`
* Shortcut: `-h`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this help message
* Default: `false`

**quiet:**

* Name: `--quiet`
* Shortcut: `-q`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not output any message
* Default: `false`

**verbose:**

* Name: `--verbose`
* Shortcut: `-v|-vv|-vvv`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
* Default: `false`

**version:**

* Name: `--version`
* Shortcut: `-V`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this application version
* Default: `false`

**ansi:**

* Name: `--ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Force ANSI output
* Default: `false`

**no-ansi:**

* Name: `--no-ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Disable ANSI output
* Default: `false`

**no-interaction:**

* Name: `--no-interaction`
* Shortcut: `-n`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not ask any interactive question
* Default: `false`

group:list
----------

* Description: Lists groups from gitlab
* Usage:

  * `group:list [--nb [NB]] [--] [<search>]`

Lists groups from gitlab

### Arguments:

**search:**

* Name: search
* Is required: no
* Is array: no
* Description: Search criteria for project names
* Default: `''`

### Options:

**nb:**

* Name: `--nb`
* Shortcut: <none>
* Accept value: yes
* Is value required: no
* Is multiple: no
* Description: Number of items to display
* Default: `50`

**help:**

* Name: `--help`
* Shortcut: `-h`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this help message
* Default: `false`

**quiet:**

* Name: `--quiet`
* Shortcut: `-q`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not output any message
* Default: `false`

**verbose:**

* Name: `--verbose`
* Shortcut: `-v|-vv|-vvv`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
* Default: `false`

**version:**

* Name: `--version`
* Shortcut: `-V`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this application version
* Default: `false`

**ansi:**

* Name: `--ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Force ANSI output
* Default: `false`

**no-ansi:**

* Name: `--no-ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Disable ANSI output
* Default: `false`

**no-interaction:**

* Name: `--no-interaction`
* Shortcut: `-n`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not ask any interactive question
* Default: `false`

group:members
-------------

* Description: Lists members of a group
* Usage:

  * `group:members [--nb [NB]] [--] <group>`

Lists members of a group

### Arguments:

**group:**

* Name: group
* Is required: yes
* Is array: no
* Description: The group name
* Default: `NULL`

### Options:

**nb:**

* Name: `--nb`
* Shortcut: <none>
* Accept value: yes
* Is value required: no
* Is multiple: no
* Description: Number of items to display
* Default: `50`

**help:**

* Name: `--help`
* Shortcut: `-h`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this help message
* Default: `false`

**quiet:**

* Name: `--quiet`
* Shortcut: `-q`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not output any message
* Default: `false`

**verbose:**

* Name: `--verbose`
* Shortcut: `-v|-vv|-vvv`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
* Default: `false`

**version:**

* Name: `--version`
* Shortcut: `-V`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this application version
* Default: `false`

**ansi:**

* Name: `--ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Force ANSI output
* Default: `false`

**no-ansi:**

* Name: `--no-ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Disable ANSI output
* Default: `false`

**no-interaction:**

* Name: `--no-interaction`
* Shortcut: `-n`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not ask any interactive question
* Default: `false`

group:members:add
-----------------

* Description: Adds members to a group
* Usage:

  * `group:members:add [--level [LEVEL]] [--] <group> <emails> (<emails>)...`

Adds members to a group

### Arguments:

**group:**

* Name: group
* Is required: yes
* Is array: no
* Description: The group name
* Default: `NULL`

**emails:**

* Name: emails
* Is required: yes
* Is array: yes
* Description: A list of user emails
* Default: `array ()`

### Options:

**level:**

* Name: `--level`
* Shortcut: <none>
* Accept value: yes
* Is value required: no
* Is multiple: no
* Description: An access level in [10, 20, 30, 40, 50]
* Default: `40`

**help:**

* Name: `--help`
* Shortcut: `-h`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this help message
* Default: `false`

**quiet:**

* Name: `--quiet`
* Shortcut: `-q`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not output any message
* Default: `false`

**verbose:**

* Name: `--verbose`
* Shortcut: `-v|-vv|-vvv`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
* Default: `false`

**version:**

* Name: `--version`
* Shortcut: `-V`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this application version
* Default: `false`

**ansi:**

* Name: `--ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Force ANSI output
* Default: `false`

**no-ansi:**

* Name: `--no-ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Disable ANSI output
* Default: `false`

**no-interaction:**

* Name: `--no-interaction`
* Shortcut: `-n`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not ask any interactive question
* Default: `false`

group:projects
--------------

* Description: Lists projects from a gitlab group
* Usage:

  * `group:projects [--orderby [ORDERBY]] [--sort [SORT]] [--nb [NB]] [--] <group> [<search>]`

Lists projects from a gitlab group

### Arguments:

**group:**

* Name: group
* Is required: yes
* Is array: no
* Description: Group name
* Default: `NULL`

**search:**

* Name: search
* Is required: no
* Is array: no
* Description: Search criteria for project names
* Default: `''`

### Options:

**orderby:**

* Name: `--orderby`
* Shortcut: <none>
* Accept value: yes
* Is value required: no
* Is multiple: no
* Description: Order results by <comment>id</comment>, <comment>name</comment>, <comment>path</comment>, <comment>created_at</comment>, <comment>updated_at</comment> or <comment>last_activity_at</comment>
* Default: `NULL`

**sort:**

* Name: `--sort`
* Shortcut: <none>
* Accept value: yes
* Is value required: no
* Is multiple: no
* Description: Return requests sorted in <comment>asc</comment> or <comment>desc</comment> order. Default is <comment>desc</comment>
* Default: `NULL`

**nb:**

* Name: `--nb`
* Shortcut: <none>
* Accept value: yes
* Is value required: no
* Is multiple: no
* Description: Number of items to display
* Default: `50`

**help:**

* Name: `--help`
* Shortcut: `-h`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this help message
* Default: `false`

**quiet:**

* Name: `--quiet`
* Shortcut: `-q`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not output any message
* Default: `false`

**verbose:**

* Name: `--verbose`
* Shortcut: `-v|-vv|-vvv`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
* Default: `false`

**version:**

* Name: `--version`
* Shortcut: `-V`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this application version
* Default: `false`

**ansi:**

* Name: `--ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Force ANSI output
* Default: `false`

**no-ansi:**

* Name: `--no-ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Disable ANSI output
* Default: `false`

**no-interaction:**

* Name: `--no-interaction`
* Shortcut: `-n`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not ask any interactive question
* Default: `false`

key:add
-------

* Description: Adds a ssh key for current user
* Usage:

  * `key:add <title> <path>`

Adds a ssh key for current user

### Arguments:

**title:**

* Name: title
* Is required: yes
* Is array: no
* Description: The title of the new ssh key
* Default: `NULL`

**path:**

* Name: path
* Is required: yes
* Is array: no
* Description: The path of the new ssh key to add
* Default: `NULL`

### Options:

**help:**

* Name: `--help`
* Shortcut: `-h`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this help message
* Default: `false`

**quiet:**

* Name: `--quiet`
* Shortcut: `-q`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not output any message
* Default: `false`

**verbose:**

* Name: `--verbose`
* Shortcut: `-v|-vv|-vvv`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
* Default: `false`

**version:**

* Name: `--version`
* Shortcut: `-V`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this application version
* Default: `false`

**ansi:**

* Name: `--ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Force ANSI output
* Default: `false`

**no-ansi:**

* Name: `--no-ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Disable ANSI output
* Default: `false`

**no-interaction:**

* Name: `--no-interaction`
* Shortcut: `-n`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not ask any interactive question
* Default: `false`

key:list
--------

* Description: Lists ssh keys from current user
* Usage:

  * `key:list [--nb [NB]]`

Lists ssh keys from current user

### Options:

**nb:**

* Name: `--nb`
* Shortcut: <none>
* Accept value: yes
* Is value required: no
* Is multiple: no
* Description: Number of items to display
* Default: `50`

**help:**

* Name: `--help`
* Shortcut: `-h`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this help message
* Default: `false`

**quiet:**

* Name: `--quiet`
* Shortcut: `-q`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not output any message
* Default: `false`

**verbose:**

* Name: `--verbose`
* Shortcut: `-v|-vv|-vvv`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
* Default: `false`

**version:**

* Name: `--version`
* Shortcut: `-V`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this application version
* Default: `false`

**ansi:**

* Name: `--ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Force ANSI output
* Default: `false`

**no-ansi:**

* Name: `--no-ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Disable ANSI output
* Default: `false`

**no-interaction:**

* Name: `--no-interaction`
* Shortcut: `-n`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not ask any interactive question
* Default: `false`

project:list
------------

* Description: Lists projects from a gitlab server
* Usage:

  * `project:list [--orderby [ORDERBY]] [--sort [SORT]] [--nb [NB]] [--] [<search>]`

Lists projects from a gitlab server

### Arguments:

**search:**

* Name: search
* Is required: no
* Is array: no
* Description: Search criteria for project names
* Default: `''`

### Options:

**orderby:**

* Name: `--orderby`
* Shortcut: <none>
* Accept value: yes
* Is value required: no
* Is multiple: no
* Description: Order results by <comment>id</comment>, <comment>name</comment>, <comment>path</comment>, <comment>created_at</comment>, <comment>updated_at</comment> or <comment>last_activity_at</comment>
* Default: `'created_ad'`

**sort:**

* Name: `--sort`
* Shortcut: <none>
* Accept value: yes
* Is value required: no
* Is multiple: no
* Description: Return requests sorted in <comment>asc</comment> or <comment>desc</comment> order. Default is <comment>desc</comment>
* Default: `'desc'`

**nb:**

* Name: `--nb`
* Shortcut: <none>
* Accept value: yes
* Is value required: no
* Is multiple: no
* Description: Number of items to display
* Default: `50`

**help:**

* Name: `--help`
* Shortcut: `-h`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this help message
* Default: `false`

**quiet:**

* Name: `--quiet`
* Shortcut: `-q`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not output any message
* Default: `false`

**verbose:**

* Name: `--verbose`
* Shortcut: `-v|-vv|-vvv`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
* Default: `false`

**version:**

* Name: `--version`
* Shortcut: `-V`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Display this application version
* Default: `false`

**ansi:**

* Name: `--ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Force ANSI output
* Default: `false`

**no-ansi:**

* Name: `--no-ansi`
* Shortcut: <none>
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Disable ANSI output
* Default: `false`

**no-interaction:**

* Name: `--no-interaction`
* Shortcut: `-n`
* Accept value: no
* Is value required: no
* Is multiple: no
* Description: Do not ask any interactive question
* Default: `false`