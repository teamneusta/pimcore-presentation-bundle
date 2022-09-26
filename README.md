# PresentationBundle

Allows to create online presentations using reveal-js

## Installation

1. Make sure you can install _neusta Pimcore Bundles_. Read this to learn how to [Require Neusta Pimcore Bundle](https://portal.neusta.de/confluence/display/NSDPIMCORE/Require+Neusta+Pimcore+Bundle).
2. Run `composer require neusta/pimcore-presentation-bundle:^1.0@dev` to install the bundle
3. Enable and _install_ the pimcore bundle to get Document and other Templates \
`bin/console pimcore:bundle:enable NeustaPimcorePresentationBundle` \
`bin/console pimcore:bundle:install NeustaPimcorePresentationBundle`

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
