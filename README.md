<h1 name="readme-top">KanboardSupport</h1>
<p align="center">
    <img src="https://img.shields.io/github/v/release/aljawaid/KanboardSupport?style=for-the-badge&color=brightgreen" alt="GitHub Latest Release (by date)" title="GitHub Latest Release (by date)">
    <img src="https://img.shields.io/github/downloads/aljawaid/KanboardSupport/total?style=for-the-badge&color=orange" alt="GitHub All Releases" title="GitHub All Downloads">
    <img src="https://img.shields.io/github/directory-file-count/aljawaid/KanboardSupport?style=for-the-badge&color=orange" alt="GitHub Repository File Count" title="GitHub Repository File Count">
    <img src="https://img.shields.io/github/repo-size/aljawaid/KanboardSupport?style=for-the-badge&color=orange" alt="GitHub Repository Size" title="GitHub Repository Size">
    <img src="https://img.shields.io/github/languages/code-size/aljawaid/KanboardSupport?style=for-the-badge&color=orange" alt="GitHub Code Size" title="GitHub Code Size">
</p>
<p align="center">
    <img src="https://img.shields.io/github/discussions/aljawaid/KanboardSupport?style=for-the-badge&color=blue" alt="GitHub Discussions" title="GitHub Discussions">
    <img src="https://img.shields.io/github/commits-since/aljawaid/KanboardSupport/latest?include_prereleases&style=for-the-badge&color=blue" alt="GitHub Commits Since Last Release" title="GitHub Commits Since Last Release">
    <img src="https://img.shields.io/github/commit-activity/m/aljawaid/KanboardSupport?style=for-the-badge&color=blue" alt="GitHub Commit Monthly Activity" title="GitHub Commit Monthly Activity">
    <a href="https://github.com/kanboard/kanboard" title="Kanboard - Kanban Project Management Software"><img src="https://img.shields.io/badge/Plugin%20for-kanboard-D40000?style=for-the-badge" alt="Kanboard"></a>
</p>

Add a support section in the Kanboard Settings interface so that end users can easily gather any information required by their internal technical support departments and for troubleshooting purposes. 

<p align="right">[<a href="#readme-bottom">&#8595; Bottom</a>] [<a href="#screenshots">&#8594; Next</a>] [<a href="#readme-top">&#8593; Top</a>]</p>

## Features

- Hide sensitive data before sharing technical information
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
  - Moved SQLite database (upload/download) options from the About page
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

<p align="right">[<a href="#readme-bottom">&#8595; Bottom</a>] [<a href="#features">&#8592; Previous</a>] [<a href="#usage">&#8594; Next</a>] [<a href="#readme-top">&#8593; Top</a>]</p>

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

<p align="right">[<a href="#readme-bottom">&#8595; Bottom</a>] [<a href="#features">&#8592; Previous</a>] [<a href="#installation--compatibility">&#8594; Next</a>] [<a href="#readme-top">&#8593; Top</a>]</p>

## Usage

Go to `Settings` &#10562; `Technical Information` 

**_or_**

Go to User Menu (top right) &#10562; `Technical Information`

<p align="right">[<a href="#readme-bottom">&#8595; Bottom</a>] [<a href="#screenshots">&#8592; Previous</a>] [<a href="#authors--contributors">&#8594; Next</a>] [<a href="#readme-top">&#8593; Top</a>]</p>

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

<p align="right">[<a href="#readme-bottom">&#8595; Bottom</a>] [<a href="#usage">&#8592; Previous</a>] [<a href="#license">&#8594; Next</a>] [<a href="#readme-top">&#8593; Top</a>]</p>

## Authors & Contributors

- [@aljawaid](https://github.com/aljawaid) - Author
- [RainerBielefeld](https://github.com/RainerBielefeld) - Contributor
- _Contributors welcome_

<p align="right">[<a href="#readme-bottom">&#8595; Bottom</a>] [<a href="#installation--compatibility">&#8592; Previous</a>] [<a href="#readme-top">&#8593; Top</a>]</p>

## License

- This project is distributed under the [MIT License](../master/LICENSE "Read The MIT license")

<a name="readme-bottom"></a>
<p align="right">[<a href="#readme-top">&#8593; Top</a>]</p>
