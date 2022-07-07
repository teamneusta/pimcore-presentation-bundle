# PresentationBundle

This branch contains the current development efforts to port the PresentationBundle from pimcore `6.4` to pimcore `X`

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
bin/composer require neusta/pimcore-presentation-bundle:dev-upgrade-to-x
```

## TODO

* update pipelines to add bundle to composer repo, see e.g. testing-framework
* Refactor SimpleSlideRenderer
* automate reveal-js installation (npm? just include it and be done with it?)
* make `revealJsPublicPath` a twig global or something / do not require it to be added to every render call
* fix layoutBase for editing mode
