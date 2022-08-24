# PresentationBundle

Allows to create online presentations using reveal-js

## Install current dev version

Edit `composer.json` and add under `repositories`:
```
"presentation-bundle": {
    "type": "git",
    "url": "git@gitlab.neusta.de:NSD/p_pimcore/bundles/presentationbundle.git"
}
```

Run the following command to install
```
bin/composer require neusta/pimcore-presentation-bundle:dev-master
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
