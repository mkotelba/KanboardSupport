# KanboardSupport
![GitHub All Releases](https://img.shields.io/github/downloads/aljawaid/KanboardSupport/total?style=for-the-badge "GitHub All Downloads") - **_A plugin for [Kanboard](https://github.com/kanboard/kanboard "Kanboard - Kanban Project Management Software")_**

Add a support section in the Kanboard Settings interface so that end users can easily gather any information required by their internal technical support departments and for troubleshooting purposes. 


## Features

- NEW: Hide sensitive data before sharing technical information _(v2.5+)_
- **Directory Permissions**
  - Check if directories are writeable or not
  - Display folder owner to Admins
  - Display detected folder permissions to Admins
  - Display permissions also in Linux format to Admins
- **User Configuration**
  - Displays basic settings about the logged in user (including user ID, IP address and browser details) which may be useful to support professionals
  - IP Lookup button for Admin
- **Application Information**
  - Displays Kanboard name, version and (if admin user) direct link to GitHub releases for Kanboard
  - Displays useful directory locations and session information
  - Show if debug mode is enabled or not
- **Database Connection**
  - Display basic database information (without password) from the config file
  - Moved SQLite database (upload/download) options from About page
- **Email Connection**
  - Show basic mail server settings
  - BCC field value only displayed for Admins
  - Show SMTP details if set
  - Show Sendmail details if set
  - Show if mail settings are configured or not
- **Server Configuration**
  - Show useful path locations
  - Display operating system, versions and ports
  - IP Lookup button for Admin
  - Make secure ports easier to identify
- **PHP Information**
  - Display general PHP settings based on the Kanboard installation requirements
  - Check if both required and optional PHP extensions are installed
  - Check PHP minimum requirement
  - Display useful file paths for configuration files


## Screenshots

**Directory Permissions**

![Directory Permissions](../master/screenshot-permissions.png "Directory Permissions")

**User Configuration Section**  

![User Configuration](../master/screenshot-user.png "User Configuration")

**Application Information Section**

![Application Information](../master/screenshot-app.png "Application Information")

**Database Connection Section**

![Database Connection](../master/screenshot-db.png "Database Connection")

**Email Connection Section**

![Email Connection](../master/screenshot-mail.png "Email Connection")

**Server Configuration Section**

![Server Configuration](../master/screenshot-server.png "Server Configuration")

**PHP Information Section**

![PHP Information](../master/screenshot-php.png "PHP Information")


## Usage

Go to `Settings` &#10562; `Technical Information` 

**_or_**

Go to User Menu (top right) &#10562; `Technical Information`

## Installation & Compatibility

<details>
    <summary><strong>Installation</strong></summary>

- Install via the **[Kanboard](https://github.com/kanboard/kanboard "Kanboard - Kanban Project Management Software") Plugin Directory** or see [INSTALL.md](../master/INSTALL.md)
- Read the full [**Changelog**](../master/changelog.md "See changes") to see the latest updates

</details>
<details>
    <summary><strong>Compatibility</strong></summary>

- Requires [Kanboard](https://github.com/kanboard/kanboard "Kanboard - Kanban Project Management Software") ≥`1.2.20`
- **Other Plugins & Action Plugins**
  - _No known issues_
  - Compatible with [ApplicationBranding](https://github.com/aljawaid/ApplicationBranding), [ContentCleaner](https://github.com/aljawaid/ContentCleaner)
- **Core Files & Templates**
  - `01` Template override
  - _No database changes_

</details>
<details>
    <summary><strong>Translations</strong></summary>

- English (UK)
- German
- _Starter template available_

</details>


## Authors & Contributors

- [@aljawaid](https://github.com/aljawaid) - Author
- [RainerBielefeld](https://github.com/RainerBielefeld) - Contributor
- _Contributors welcome_


## License

- This project is distributed under the [MIT License](../master/LICENSE "Read The MIT license")
