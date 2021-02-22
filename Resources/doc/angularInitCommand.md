# `angular:init` command

## What does it do?

### Generate the `package.json` file

The command generate the `package.json` file using the `npm init` with
`<name>` for project name, with `<name>` taken from the `name` property in the
`composer.json` file, removing the scope name (the value before the `/`).

If the `name` is not set in the `composer.json`, then the command will ask for
them (with the question `What's your application name ?`), where you'll have to
answer `<@scope>/<name>`, the command will send you an error if you don't,
because the command can also set the `composer.json` `name` parameter.

The project name can also be set with the `--project-name` or `-n` option.
If the `--project-name` option is set, then the command will change the
`composer.json` project name value. To set the `composer` value, the command
`composer config name "<@scope>/<name>"` is used.

The following facultative options are available:
* **`--app-version`**: The angular application version. By default, the
  `composer.json` `version` parameter is taken, or if not setted, 1.0.0.
* **`--description`**: The angular application description. By default, the
  `composer.json` `description` parameter is taken.
* **`--project-name`** or **`-p`**: The angular application and Symfony
  application name. The option change the `composer.json` `name` value.
* **`--angular-project-name`**: The angular application name. Can be used to
  only set angular application name without set or change the `composer.json`
  `name` property.
* **`--git-repository`**: The angular application git repository.
* **`--keywork`** or **`-k`**: The angular application keywords. Can be used
  multiple times. By default the `composer.json` `keywords` value is taken.
* **`--author`**: The angular application author. By default, the first
  `composer.json` `authors` property value is taken.
* **`--license`**: The angular application license. By default, the  
  `composer.json` `license` value is taken.
* **`--directory`** or **`-d`**: The angular application directory. The
  directory is used to set the `package.json` `main` value, and to generate
  your angular application entry point file.
