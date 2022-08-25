# PresentationBundle

Allows to create online presentations using reveal-js

## Installation

Edit your Projects `composer.json` and add the neusta pimcore repository under `repositories`:
```json
{
    "repositories": {
        "gitlab.neusta.de/NSD/p_pimcore": {
            "type": "composer",
            "url": "https://gitlab.neusta.de/api/v4/group/883/-/packages/composer/packages.json"
        }
    }
}
```

Run `composer require` to install the bundle
```
composer require neusta/pimcore-presentation-bundle:^1.0@dev
```

## Install reveal.js

After the Bundle is installed it is required to manually install reveal-js

```shell
cd vendor/neusta/pimcore-presentation-bundle/Resources/public
curl -OL https://github.com/hakimel/reveal.js/archive/master.zip
unzip master.zip
rm master.zip
```

## Attribution

Icon by <a href="https://www.flaticon.com/free-icons/project" title="project icons">Project icons created by Freepik - Flaticon</a>
