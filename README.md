# Pimcore Presentation Bundle

![CI](https://github.com/teamneusta/pimcore-presentation-bundle/actions/workflows/test-and-qa.yaml/badge.svg)

![Software License](https://img.shields.io/badge/license-GPLv3-informational.svg)
![Required Pimcore Version](https://shields.io/static/v1?label=Required%20Pimcore%20Version&message=10.0&color=informational)
![Supported Pimcore Version](https://shields.io/static/v1?label=Supported%20Pimcore%20Version&message=10.5&color=informational)

Allows to create online presentations in Pimcore using [reveal-js](https://revealjs.com/).

## Installation

Require via Composer

```shell
composer require teamneusta/pimcore-presentation-bundle
```

As this is a Pimcore bundle, enable and install it

```shell
console pimcore:bundle:enable NeustaPimcorePresentationBundle
console pimcore:bundle:install NeustaPimcorePresentationBundle
```

### Install reveal.js

After the Bundle is installed it is required to manually install reveal-js

```shell
cd vendor/teamneusta/pimcore-presentation-bundle/public
curl -OL https://github.com/hakimel/reveal.js/archive/master.zip
unzip master.zip
rm master.zip
```

## Usage

Create new Pimcore document pages using the Document Types offered by this
bundle. [See documentation for more details](docs/index.md)

## Configuration

The bundle provides a handful of _simple_ areabricks for creating presentations. When the bundle is used together with
other bundles, there may be collisions of areabrick names or you may simply not be interested in using the _default_
bricks. It is possible to disable the included areabricks with the following configuration

```yaml
neusta_pimcore_presentation:
    bricks: false
```

## Contribution

Feel free to open issues for any bug, feature request, or other ideas.

Please remember to create an issue before creating large pull requests.

### Local Development

To develop on local machine, the vendor dependencies are required.

```shell
bin/composer install
```

We use composer scripts for our main quality tools. They can be executed via the `bin/composer` file as well.

```shell
bin/composer cs:fix
bin/composer phpstan
bin/composer test
```
