# Remote Hell - Another PHP Shell

With Remote Hell you can execute commands like if they're executing in your system.

You can do things like:

rh ls -l

and Remote Hell will execute the command and gives you the output on the terminal.

This permits the usage of remote commands and local commands, like this:

rh cat /var/www/wordpress/wp-config.php > wp-config.php

You are sending the content of the remote file to a local file.

It's really simple. But it's really usefull! ;)

## Authentication

Remote Hell authenticates you with a very basic mecanism:

You send the password with each HTTP request, if the password is correct, the commands are executed, if not, nothing happens.

__Note:__ If the connection is plaintext (HTTP and not HTTPS), the password will be sent in cleartext.

## Execution Methods

Remote Hell automatically tries various PHP command execution methods, or functions:

- system
- shell_exec
- exec
- passthru
- popen

When it finds an allowed method, uses it. 

## Configuration

You can adjust some parameters editing the ~/.rhell.cfg file, that it's created the first time that you run Remote Hell.
