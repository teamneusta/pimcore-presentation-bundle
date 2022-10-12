# Pimcore Presentation Bundle

![CI](https://github.com/teamneusta/pimcore-presentation-bundle/actions/workflows/php81-test-and-qa.yaml/badge.svg)
![Software License](https://img.shields.io/badge/license-GPLv3-informational.svg)
![Pimcore Version](https://shields.io/static/v1?label=Pimcore%20Version&message=10.5&color=informational)

Allows to create online presentations in Pimcore using reveal-js

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
cd vendor/neusta/pimcore-presentation-bundle/Resources/public
curl -OL https://github.com/hakimel/reveal.js/archive/master.zip
unzip master.zip
rm master.zip
```

## Usage

Create new Pimcore document pages via the document types that are offered by this bundle.

## Configuration

The bundle provides a handful of _simple_ Areabricks to create Presentations. When the bundle is used alongside other bundles it might lead to Areabrick name collisions or one is just not interested in using the _default_ Bricks. It is possible to disable the included Areabricks using the following configuration

```yaml
neusta_pimcore_presentation:
    bricks: false
```

## Contribution

Feel free to open issues for any bug, feature request or other ideas. There is no issue template at the moment.

Please mention to write an issue, before create large pull requests.
